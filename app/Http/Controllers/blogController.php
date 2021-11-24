<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\blog;
use App\Models\category;
use App\Models\tag;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Response;
use App\Traits\MyTrait;
class blogController extends Controller
{

use MyTrait;
    
    public function index(){
        $blogs=blog::all();
        return view('adminSide.blogs',compact('blogs'));
    }

    public function createBlog(){
        $categories = category::all();
        $tags = tag::all();
        return view ('adminSide.createBlogs',compact('categories','tags'));
    }

    public function getAllBlogs(){

   
    $blogs= blog::all();
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



    // edit 
    public function editBlogView($id){
$categories = category::all();
$tags = tag::all();
$blogs =blog::find($id);
return view('adminSide.editBlogsView', compact('categories','tags','blogs'));


    }


      public function editBlogViews($id){
$categories = category::all();
$tags = tag::all();

return view('adminSide.editBlogsView',compact('categories','tags'));


    }

    public function create(Request $request){
        $user = Auth::user();
       $active = $request->active == 'on' ? '1' : '0';
       $request->validate([
            'title' => 'required|min:3',
            'url' => 'required|min:3',
            'category' => 'required',
            'tag' => 'required',
            'image' => 'required|max:2000',
            'image_alt' => 'required|min:3',
            'meta' => 'required|min:3',
            'short_description' => 'required|min:3',
            'description' => 'required|min:3',
 ]);

     $uploadedImage = $request->file('image');
    $imageWithExt = $uploadedImage->getClientOriginalName();
$imageName = pathinfo($imageWithExt, PATHINFO_FILENAME);
     $imageExt = $uploadedImage->getClientOriginalExtension();
     $image = $imageName . time() . "." . $imageExt;
     $request->image->move(public_path('/images/blogsImages'), $image);
    $blog = blog::create([
     'user_id' => $user->id,
     'category_id' => $request->category,
     'title' => $request->title,
     'url' => $request->url,
     'image' => $image,
     'image_alt' => $request->image_alt,
     'meta' => $request->meta,
     'short_description' => $request->short_description,
     'description' => $request->description,
     'active' => $active,
    ]);
//$blog->tags()->attach($request->tags);
return redirect()->back()->with('success','Blogs was submitted');

}



public function deleteTags($id){

    $blog = blog::findOrFail($id);
    if($blog){
        $path = '/images/blogImages/';
        $image = $blog->image;
        $this->deleteImage($path,$image);
        $blog->delete();
        return 'success';
    }else{
        return Response::json(['error' => 'Not found'],404);
    }


}


// awaiting approvel blogs list blade for admin

 public function awaitingBlogs(){
    return view('adminSide.awaitingBlogs');
 }

 // show awaiting approvel blogs list for admin

 public function getAwaitingApprovalBlogs(){
    $blogs= blog::where('active', 0)->get();
  return Datatables::of($blogs)
  ->editColumn('user_id', function ($blogs){
    return $blogs->user->name;
})
->editColumn('category_id', function ($blogs){
    return $blogs->category->name;
})
  ->editColumn('short_description', function ($blog){
          return Str::words($blog->short_description, 5 , '...');
  })
  ->editColumn('description', function ($blog){
    return Str::words($blog->description, 7 , '...');
})
->editColumn('active', function ($blog){
    if($blog->active == "1"){
        return "<span class='badge badge-success badge-pill'>Active</span>";
    }else{
        return "<span class='badge badge-dark badge-pill'>Awating</span>";
    }
})
->rawColumns(['active','description'])
  ->make(true);

 }



// validation method called
public function updateBlogValidation($request){
    if($request->has('image'))
    {
 $request->validate([
            'title' => 'required|min:3',
            'url' => 'required|min:3',
            'category' => 'required',
            'tag' => 'required',
            'image' => 'required|max:2000',
            'image_alt' => 'required|min:3',
            'meta' => 'required|min:3',
            'short_description' => 'required|min:3',
            'description' => 'required|min:3',
 ]);
    }else{
$request->validate([
            'title' => 'required|min:3',
            'url' => 'required|min:3',
            'category' => 'required',
            'tag' => 'required',
            'image_alt' => 'required|min:3',
            'meta' => 'required|min:3',
            'short_description' => 'required|min:3',
            'description' => 'required|min:3',
 ]);
    }
}


// delete Blogs
public function deleteBlogs($id){
    
$blog = blog::findOrFail($id);
if($blog)
{
    $path = '/images/blogsImages/';
    $image = $blog->image;
    $this->deleteImage($path, $image);

    $blog->delete();
    return "Success";
}else{
    return Response::json(['error' => 'Not Found'],404);
}
}
 // delete images from db
public function deleteImage($path, $image){
    if(file_exists(public_path().$path.$image)){
        unlink(public_path().$path.$image);
    }
}


// get user awaiting blogs
public function getBlogs(){
    $user_id = Auth::user()->id;
    $blogs= blog::where('user_id', $user_id)->where('active', 0)->get();
  return Datatables::of($blogs)
  ->editColumn('user_id', function ($blogs){
    return $blogs->user->name;
})
->editColumn('category_id', function ($blogs){
    return $blogs->category->name;
})
  ->editColumn('short_description', function ($blog){
          return Str::words($blog->short_description, 4 , '...');
  })
  ->editColumn('description', function ($blog){
    return Str::words($blog->description, 4 , '...');
})
->editColumn('active', function ($blog){
    if($blog->active == "1"){
        return "<span class='badge badge-success badge-pill'>Active</span>";
    }else{
        return "<span class='badge badge-dark badge-pill'>Awating</span>";
    }
})
->rawColumns(['active','description'])
  ->make(true);
}

public function editBlogsView($id){
    $tags=tag::all();
        $categories=category::all();
        $blogs=blog::all();
    return view('adminSide.editBlogs',compact('tags','categories','blogs'));
}



// get user approved blogs
public function getApprovedBlogs(){
    $user_id = Auth::user()->id;
    $blogs= blog::where('user_id', $user_id)->where('active', 1)->get();
  return Datatables::of($blogs)
  ->editColumn('user_id', function ($blogs){
    return $blogs->user->name;
})
->editColumn('category_id', function ($blogs){
    return $blogs->category->name;
})
  ->editColumn('short_description', function ($blog){
          return Str::words($blog->short_description, 5 , '...');
  })
  ->editColumn('description', function ($blog){
    return Str::words($blog->description, 7 , '...');
})
->editColumn('active', function ($blog){
    if($blog->active == "1"){
        return "<span class='badge badge-success badge-pill'>Active</span>";
    }else{
        return "<span class='badge badge-dark badge-pill'>Awating</span>";
    }
})
->rawColumns(['active','description'])
  ->make(true);
}



}
