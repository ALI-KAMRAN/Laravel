<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<div class="container">
  <form action="/action_page.php">


    <div class="row">
      <div class="col-25">
        <label for="fname">Blog Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{$blogs->title}}">
      </div>
    </div>

<div class="row">
      <div class="col-25">
        <label for="fname">Blog Url</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{$blogs->url}}">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Image Alt Text</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{$blogs->image_alt}}">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="fname" name="firstname" >
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="fname">Meta</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{$blogs->meta}}">
      </div>
    </div>

        <div class="row">
      <div class="col-25">
        <label for="country">Category</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="australia">Seect Option</option>
          @foreach($categories as $category)
        <option {{$blogs->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
      </div>
    </div>



<div class="row">
  <div class="col-25">
    <label for="subject">Tags</label>
  </div>
<div class="col-75">
  <select name="tag[]" id="tag[]" class="form-control tag" multiple="multiple" >
          <option value="">Select Tags</option>
          @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
  
      </select>
</div>
</div>


<div class="row">
  <div class="col-25">
    <label for="subject">Short Description</label>
  </div>
<div class="col-75">
  <textarea id="subject" name="subject"  value="" style="height:200px">{{$blogs->short_description}}</textarea>
</div>
</div>


    <div class="row">
<div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" value="" style="height:200px">{{$blogs->description}}</textarea>
      </div>
    </div>

  <div class="row">
<div class="col-25">
        <label for="subject">Published Blogs</label>
      </div>
        <div class="col-75">
<div class="form-check mb-2">
  <input type="checkbox" name="active" id="active" class="form-check-input" {{$blogs->active == 1 ? 'checked' : ''}}>
<label for="active" class="form-check-lable">Published</label>
</div>
</div>
</div>


    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>







<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

</body>
</html>