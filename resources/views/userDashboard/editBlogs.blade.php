@extends('userDashboard.masterPage.master')

@section('title')
Edit Blogs
@endsection


@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
.ck-editor__editable_inline{
    height : 350px;
}

</style>
@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 ml-3 text-gray-800">Edit Blogs For Users  </h1></div>
                    <div class="row">

                 
<div class="col-xl-12 col-lg-8">
<div class="card-body">
<form action="{{url('blogUpdate')}}" method="post" enctype='multipart/form-data'>

@csrf

<input type="hidden" name="blog_id" value="{{$blog->id ?? '' }}">
 <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="title">Blog Title:</label>
      <input type="text"  class="form-control" id="title" name="title"  value="{{$blog->title}}">
      @if($errors->has('title'))
      <small class="text-danger ml-1">{{$errors->first('title')}}</small>
      @endif
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="url">Blog URL:</label>
      <input type="text"  class="form-control"  name="url" id="url" value="{{$blog->url}}">
      @if($errors->has('url'))
      <small class="text-danger ml-1">{{$errors->first('url')}}</small>
      @endif
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="category">Blog Category:</label>
      <select name="category" id="category" class="form-control" value="{{old('category')}}">
          <option value="">Select Category</option>
        @foreach($categories as $category)
        <option {{$blog->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        
      </select>
      @if($errors->has('category'))
      <small class="text-danger ml-1">{{$errors->first('category')}}</small>
      @endif
      
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="tag">Blog Tags:</label>
    <select name="tag[]" id="tag[]" class="form-control tag" multiple="multiple" >
          <option >Select Tags</option>
          @foreach($tags as $tag)
        <option 
        @foreach($blog->tags as $bt)
        @if($bt->id == $tag->id)
        selected
        @endif
        @endforeach
        value="{{$tag->id}}"
        >{{$tag->name}}</option>
        @endforeach
  
      </select>
      @if($errors->has('tag'))
      <small class="text-danger ml-1">{{$errors->first('tag')}}</small>
      @endif
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="image">Select Image:</label>
     <input type="file" name="image" id="image" class="form-control-file" value="{{old('image')}}">
     @if($errors->has('image'))
      <small class="text-danger ml-1">{{$errors->first('image')}}</small>
      @endif
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="image_alt">Image Alt Text:</label>
    <input type="text" name="image_alt" id="image_alt" class="form-control"   value="{{$blog->image_alt}}">
    @if($errors->has('image_alt'))
      <small class="text-danger ml-1">{{$errors->first('image_alt')}}</small>
      @endif
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="meta">Meta:</label>
    <input type="text" name="meta" id="meta" class="form-control"   value="{{$blog->meta}}">
    @if($errors->has('meta'))
      <small class="text-danger ml-1">{{$errors->first('meta')}}</small>
      @endif
    </div>
    </div>

    <div class="form-row">
    
  <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
  <label for="short_description">Short Description:</label>
<textarea name="short_description" id="short_description" cols="127" rows="5">{{$blog->short_description}}</textarea>
@if($errors->has('short_description'))
      <small class="text-danger ml-1">{{$errors->first('short_description')}}</small>
      @endif
    </div>
    </div>

    <div class="form-row">
  <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
  <label for="description">Description:</label>
<textarea name="description" id="description" cols="127" rows="10">{{$blog->description}}</textarea>
@if($errors->has('description'))
      <small class="text-danger ml-1">{!! $errors->first('description') !!}</small>
      @endif
    </div>
    </div>


    <div class="form-check mb-2">
        <input type="checkbox" name="active" id="active" class="form-check-input" {{$blog->active == 1 ? 'checked' : ''}}>
        <label for="active" class="form-check-lable">Publish Blogs</label>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>


</div>
</div>
</div>
 








   





@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script type="text/javascript">
$(".tag").select2({
    placeholder: "Select a Tags",
    allowClear: true
});
ClassicEditor
                                .create( document.querySelector( '#description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

      // swal fire on record save
      var success = "{{ session('success') ?? '' }}";
      setTimeout(function() {
        
      
      if(success !== ''){
        Swal.fire({
          icon : 'success',
          title : 'Success',
          text : 'Blog was created successfully',
        })
      }
    }, 500);
</script>


@endsection
