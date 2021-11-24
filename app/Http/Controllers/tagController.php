<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Response;
class tagController extends Controller
{
    public function index(){
        return view ('adminSide.tags');
}

   public function create(Request $request){
        $request->validate([
                'tag_name' => 'required|min:3',
        ]);
       $slug = Str::slug($request->tag_name);
       $category = tag::create([
              'name' => $request->tag_name,
              'slug' => $slug,
       ]);
       return "Success";
}

public function getAllTags(){

    $tag= tag::all();
  return Datatables::of($tag)
  ->editColumn('created_at', function ($tag){
          return $tag->created_at ? with(new Carbon($tag->created_at))->format('d-M-Y'): '';
  })
  ->editColumn('updated_at', function ($tag){
        return $tag->updated_at ? with(new Carbon($tag->updated_at))->format('d-M-Y'): '';
})
  ->make(true);
    
}

// get category for update 

public function getTags($id){
   $tag = tag::find($id);
   if($tag){
           return $tag;
   }else{
           return Response::json(['error' =>'Not found'],404);
   }
}

//update category
public function updateTags(Request $request){

        $request->validate([
                'edit_tag_name' => 'required|min:3',
        ],[
                'edit_tag_name.required'=> 'name is required',
                'edit_tag_name.min'=>'min character is 3',
        ]);
        $tag = tag::find($request->Tag_id);
        $tag->name = $request->edit_tag_name;
        $tag->slug = Str::slug($request->edit_tag_name);
        $tag->save();
        return "success";
}

// delete tag
public function deleteTags($id){
$tag = tag::find($id);
if($tag){
        $tag->delete();
        return "success";
}else{
        return Response::json(['error'=>'not found'],404);
}
}
}
