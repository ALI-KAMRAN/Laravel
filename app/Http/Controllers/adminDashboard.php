<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;
use App\Models\blog;
use App\Models\tag;
use App\Models\category;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Response;
use App\Traits\MyTrait;
use Auth;
use Hash;

class adminDashboard extends Controller
{

 use MyTrait;

    public function viewAllUsers(){
        return view('adminSide.viewAllUsers');
    }
    public function getAllUsersAdmin(){
       // $users = User::all();  // show all users and admin

$users= role::where('id',2)->first()->users()->get();  // show only 2nd user after admin
  return Datatables::of($users)
  ->editColumn('created_at', function ($user){
          return $user->created_at ? with(new Carbon($user->created_at))->format('d-M-Y'): '';
  })
  ->editColumn('updated_at', function ($user){
        return $user->updated_at ? with(new Carbon($user->updated_at))->format('d-M-Y'): '';
})
  ->make(true);

    }


    public function deleteUsersAdmin($id){

  $user = User::findOrFail($id);
  if($user){
    $path = '/images/blogsImages/';
    foreach($user->blogs as $blog){
      $image = $blog->image;
      $this->deleteImage($path, $image);
    }
   
    $user->delete();
    return "Success";
  }else{
    return Response::json(['error'=>'not found'],404);
  }

    }
// admin profil update form
    public function profileUpdateForm(){
      $user = Auth::User();
      return view('adminSide.profileUpdateForm',compact('user'));
    }

// admin profiel update
    public function profileUpdate(Request $request){
 
  $authUser = Auth::user();
  $request->validate([
'username' => ['required','string','max:255'],
'email' => ['required','string','email','max:255','unique:users,email,'.$authUser->id],

  ]);

  $authUser->name = $request->username;
  $authUser->email = $request->email;
  $authUser->update();
  return redirect()->back()->with('success','update successfully');
    }

// admin password update form
    public function passwordUpdateForm(){

      return view('adminSide.passwordUpdate');
    }

    // admin password update

    public function passwordUpdate(Request $request){

      $authUser = Auth::user();
      $request->validate([
     'old_password' => ['required'],
     'password' => ['required','string','min:8','confirmed'],
     'password_confirmation' => ['required'],
      ]);
      if(Hash::check($request->old_password,$authUser->password))
      {
        $authUser->password = Hash::make($request->password);
        $authUser->update();
        return redirect()->back()->with('success','Password updated successfuy');
      }else{
        return redirect()->back()->with('error','Old Password does not match');

      }
    }



// awaiting blogs list view blade for admin

 public function awaitingBlogs(){
    $blogs = blog::all();
    return view('adminSide.awaitingBlogs',compact('blogs'));
 }

 // show awaiting blogs list for admin

 public function getAwaitingApprovalBlogs(){
    $blogs= blog::where('active', 0)->get();
    return Datatables::of($blogs)
    ->editColumn('user_id', function ($blog){
            return $blog->user->name;
    })
    
    ->editColumn('category_id', function ($blog){
            return $blog->category->name;
    })
    ->editColumn('active', function ($blog){
            if($blog->active == "1"){
              return "<span class='badge badge-success badge-pill'>Active</span>";
            }else{
  return "<span class='badge badge-dark badge-pill'>Awating Approval</span>";
  
            }
    })
  
    ->editColumn('short_description', function ($blog){
            return Str::words($blog->short_description, 5, '.....');
    })
    ->editColumn('description', function ($blog){
            return Str::words($blog->short_description, 5, '.....');
    })
    ->rawColumns(['description','active'])
    ->make(true);
 }



// approved blogs list view blade for admin

 public function approvedBlogsAdmin(){
    $blogs = blog::all();
    return view('adminSide.approvedBlogs',compact('blogs'));
 }

 // show  approvel blogs list for admin

 public function getApprovalBlogsAdmin(){
    $blogs= blog::where('active', 1)->get();
    return Datatables::of($blogs)
    ->editColumn('user_id', function ($blog){
            return $blog->user->name;
    })
    
    ->editColumn('category_id', function ($blog){
            return $blog->category->name;
    })
    ->editColumn('active', function ($blog){
            if($blog->active == "1"){
              return "<span class='badge badge-success badge-pill'>Active</span>";
            }else{
  return "<span class='badge badge-dark badge-pill'>Awating Approval</span>";
  
            }
    })
  
    ->editColumn('short_description', function ($blog){
            return Str::words($blog->short_description, 5, '.....');
    })
    ->editColumn('description', function ($blog){
            return Str::words($blog->short_description, 5, '.....');
    })
    ->rawColumns(['description','active'])
    ->make(true);
 }


// admin approve user blog clicking checkbox

 public function adminApproveUserBlog($id){
    $blog = blog::where('id', $id)->first();
    if($blog){
        $blog->active = 1;
        $blog->save();
        return "Success";
    }else{
        return Response::json(['error' => 'Not Found'], 404);
    }
 }






public function editBlogsViewAdmin($id){
    $categories = category::all();
    $tags = tag::all();
    $blogs = blog::find($id);
    return view('adminSide.editBlogs',compact('categories','tags','blogs'));

}


}
