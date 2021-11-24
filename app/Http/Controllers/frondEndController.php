<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\cms;
use App\Models\contact;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
class frondEndController extends Controller
{
    public function index(){
        $blogs = blog::where('active',1)->get();
        $footer = cms::where('section_name' , 'footer_section')->first();
        return view('frondEnd.homePage', compact('blogs','footer'));
    }
    public function blogDetailsview($url){
     $blog=blog::where('url',$url)->first();
      $footer = cms::where('section_name' , 'footer_section')->first();
      return view('frondEnd.blogs_detail',compact('blog','footer'));
        
    }

public function cms(){
    $about_section = cms::where('section_name', 'about_section')->first();
    $contect_section = cms::where('section_name', 'contect_section')->first();
    $footer_section = cms::where('section_name', 'footer_section')->first();
    return view('adminSide.cms',compact('about_section','contect_section','footer_section'));
}

public function aboutCmsInsertOrUpdate(Request $request){
        
 $request->validate([
 'about_heading' => 'required|min:3',
 'about_description' => 'required|min:3',
 'about_short_description' => 'required|min:3'


 ]);

if(empty($request->about_section_name)){

$about = cms::create([

'about_heading' => $request->about_heading,
'about_description' => $request->about_description,
'about_short_description' => $request->about_short_description,
'section_name' => 'about_section',
 ]);
$msg = 'Created';
return compact('msg','about');

}else{

    $about = cms::where('section_name', 'about_section')->first();
    $about->about_heading = $request->about_heading;
    $about->about_short_description = $request->about_short_description;
    $about->about_description = $request->about_description;
    $about->save();

    $msg = 'Updated';
    return compact('msg', 'about');
 }

}


public function contectCmsInsertOrUpdate(Request $request){
        
 $request->validate([
 'contect_heading' => 'required|min:3',
 'contect_description' => 'required|min:3',
 'contect_short_description' => 'required|min:3'


 ]);

if(empty($request->contect_section_name)){

$contect = cms::create([

'contect_heading' => $request->contect_heading,
'contect_description' => $request->contect_description,
'contect_short_description' => $request->contect_short_description,
'section_name' => 'contect_section',
 ]);
$msg = 'Created';
return compact('msg','contect');

}else{

    $contect = cms::where('section_name', 'contect_section')->first();
    $contect->contect_heading = $request->contect_heading;
    $contect->contect_short_description = $request->contect_short_description;
    $contect->contect_description = $request->contect_description;
    $contect->save();

    $msg = 'Updated';
    return compact('msg', 'contect');
 }

}


public function footerCmsInsertOrUpdate(Request $request){
        
 $request->validate([
 'twitter' => 'required|min:3',
 'facebook' => 'required|min:3',
 'instagram' => 'required|min:3'


 ]);

if(empty($request->footer_section_name)){

$footer = cms::create([

'twitter' => $request->twitter,
'facebook' => $request->facebook,
'instagram' => $request->instagram,
'section_name' => 'footer_section',
 ]);
$msg = 'Created';
return compact('msg','footer');

}else{

    $footer = cms::where('section_name', 'footer_section')->first();
    $footer->twitter = $request->twitter;
    $footer->facebook = $request->facebook;
    $footer->instagram = $request->instagram;
    $footer->save();

    $msg = 'Updated';
    return compact('msg', 'footer');
 }

}

public function aboutDataDisplay(){
   $about = cms::where('section_name' , 'about_section')->first();
   $footer = cms::where('section_name' , 'footer_section')->first();
    return view('frondEnd.about',compact('about'));
}

public function contectDataDisplay(){
   $contect = cms::where('section_name' , 'contect_section')->first();
   $footer = cms::where('section_name' , 'footer_section')->first();
    return view('frondEnd.contect',compact('contect','footer'));
}

// submit contect us form 

public function submitContectForm(Request $request){

     $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|min:3|email',
                'phone_num' => 'required|min:3',
                'message' => 'required|min:3|max:500',
        ]);
   
       $contectForm = contact::create([
              'name' => $request->name,
              'email' => $request->email,
              'phone_num' => $request->phone_num,
              'message' => $request->message,
             
       ]);
       return "Success";
}

public function showUserMessage(){

return view('adminSide.message');

}
 
 public function getAllMessage(){

    $messages= contact::all();
  return Datatables::of($messages)
  ->editColumn('created_at', function ($message){
          return $message->created_at ? with(new Carbon($message->created_at))->format('d-M-Y'): '';
  })
  ->editColumn('message', function ($message){
          return Str::words($message->message, 3 , '...');
  })
  
  ->make(true);
 }

 public function viewContactMessageDetail($id){

    $messages = contact::findOrFail($id);
   if($messages){
           return $messages;
   }else{
           return Response::json(['error' =>'Not found'],404);
   }
 }

 public function deleteMsg($id){
 $msg = contact::findOrFail($id);
   if($msg){
    $msg->delete();
           return "Success";
   }else{
           return Response::json(['error' =>'Not found'],404);
   }

 }

}
