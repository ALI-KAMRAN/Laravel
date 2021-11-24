<div class="card shadow mb-4"> 
   <!-- Card Header - Accordion -->
    <a href="#about" class="d-block card-header py-3" data-toggle="collapse"
    role="button" aria-expanded="true" aria-controls="about">
     <h6 class="m-0 font-weight-bold text-primary">About</h6>
      </a>
    <!-- Card Content - Collapse -->
    <div class="collapse " id="about">
       <div class="card-body">
        
        <div class="card-body">
<form action="" id="aboutCms" method="post" enctype='multipart/form-data'>

@csrf
<input type="hidden" name="about_section_name" id="about_section_name" value="{{$about_section->section_name ?? ''}}">
 <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="title">About Heading</label>
      <input type="text"  class="form-control" id="about_heading" name="about_heading" placeholder="Heading" value="{{$about_section->about_heading ?? ''}}">
      
      <small  id="about_heading_help" class="text-danger ml-1"></small>
     
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="url">About Short Description</label>
      <input type="text"  class="form-control" placeholder="Description" name="about_short_description" id="about_short_description" value="{{$about_section->about_short_description ?? ''}}">
      
      <small id="about_short_description_help" class="text-danger ml-1"></small>
      
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
  <label for="about_description">Description:</label>
<textarea name="about_description" id="about_description" cols="116" rows="5">{{$about_section->about_description ?? ''}}</textarea>

      <small id="about_description_help" class="text-danger ml-1"></small>
     
    </div>
    </div>
    <button type="submit" class="btn btn-success">Create / Update</button>
</form>
 </div> 


      </div>
        </div>
        </div>