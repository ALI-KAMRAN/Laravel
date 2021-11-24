<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\category;
use App\Models\tag;
use App\Models\blog;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Hash;
class userDashBoard extends Controller
{
    public function userDashboard(){
         
         $user_id = Auth::user()->id;
         $blogsCount = blog::where('user_id', $user_id)->count();
         $approvedBlogsCount = blog::where('user_id', $user_id)->where('active',1)->count();
        $awaitingBlogsCount = blog::where('user_id', $user_id)->where('active',0)->count();

    	return view('userDashboard.dashboard',compact('user_id','blogsCount','approvedBlogsCount','awaitingBlogsCount'));
    }

    public function adminDashboard(){
        $categoriesCount = category::count();
        $tagCount = tag::count();
        $blogsCount = blog::count();
        $publishedBlogsCount = blog::where('active', 1)->count();
        $awaitingBlogsCount = blog::where('active', 0)->count();
        $usersCount = User::count();


        return view('adminSide.dashboard',compact('categoriesCount','tagCount','publishedBlogsCount','awaitingBlogsCount','usersCount','blogsCount'));
    }



   public function createBlogs(){
   	   $categories = category::all();
        $tags = tag::all();
        return view ('userDashboard.createBlogs',compact('categories','tags'));
   }

   public function awaitingBlogs(){
       return view('userDashboard.awaitingBlogs');
   }

   public function userBlogBladeView($id){
    $categories = category::all();
    $tags = tag::all();
    $blog = blog::find($id);
       return view('userDashboard.editBlogs',compact('blog','categories','tags'));
   }


   public function approvedBlogsUser(){
    return view('userDashboard.approvedBlogsUser');
   }

  

// user dashboard profil update form
    public function userProfileUpdateForm(){
      $user = Auth::User();
      return view('userDashboard.userProfileUpdateForm',compact('user'));
    }

// user dashboard profiel update
    public function userprofileUpdate(Request $request){
 
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

// user dashboard password update form
    public function userPasswordUpdae(){

      return view('userDashboard.userPasswordUpdate');
    }

    // user dashboard password update

    public function userPasswordUpdate(Request $request){

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


}
