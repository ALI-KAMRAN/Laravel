<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Response;
class addCatogery extends Controller
{

public function index(){
        return view ('adminSide.categries');
}

   public function create(Request $request){
        $request->validate([
                'category_name' => 'required|min:3',
        ]);
       $slug = Str::slug($request->category_name);
       $category = category::create([
              'name' => $request->category_name,
              'slug' => $slug,
       ]);
       return "Success";
}

public function getAllCategories(){

    $categories= category::all();
  return Datatables::of($categories)
  ->editColumn('created_at', function ($categories){
          return $categories->created_at ? with(new Carbon($categories->created_at))->format('d-M-Y'): '';
  })
  ->editColumn('updated_at', function ($categories){
        return $categories->updated_at ? with(new Carbon($categories->updated_at))->format('d-M-Y'): '';
})
  ->make(true);
    
}

// get category for update 

public function getCategory($id){
   $category = category::find($id);
   if($category){
           return $category;
   }else{
           return Response::json(['error' =>'Not found'],404);
   }
}

//update category
public function updateCategory(Request $request){

        $request->validate([
                'editCategory_name' => 'required|min:3',
        ],[
                'editCategory_name.required'=> 'name is required',
                'editCategory_name.min'=>'min character is 3',
        ]);
        $category = category::find($request->Category_id);
        $category->name = $request->editCategory_name;
        $category->slug = Str::slug($request->editCategory_name);
        $category->save();
        return "success";
}

// delete category
public function deleteCategory($id){
$category = category::find($id);
if($category){
        $category->delete();
        return "success";
}else{
        return Response::json(['error'=>'not found'],404);
}
}


        
        }
       
        



