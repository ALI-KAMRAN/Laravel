  <div class="card shadow mb-4"> 
   <!-- Card Header - Accordion -->
    <a href="#contect" class="d-block card-header py-3" data-toggle="collapse"
    role="button" aria-expanded="true" aria-controls="contect">
     <h6 class="m-0 font-weight-bold text-primary">Contect</h6>
      </a>
    <!-- Card Content - Collapse -->
    <div class="collapse " id="contect">
       <div class="card-body">
        <div class="card-body">
<form action="" id="contectCms" method="post" enctype='multipart/form-data'>

@csrf
<input type="hidden" name="contect_section_name" id="contect_section_name" value="{{$contect_section->section_name ?? ''}}">
 <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="title">Contect Heading</label>
      <input type="text"  class="form-control" id="contect_heading" name="contect_heading" placeholder="Heading" value="{{$contect_section->contect_heading ?? ''}}">
     
      <small id="contect_heading_help" class="text-danger ml-1"></small>

    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="url">Contect Short Description</label>
      <input type="text"  class="form-control" placeholder="Description" name="contect_short_description" id="contect_short_description" value="{{$contect_section->contect_short_description ?? ''}}">
      
      <small id="contect_short_description_help" class="text-danger ml-1"></small>
      
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
  <label for="contect_description">Description:</label>
<textarea name="contect_description" id="contect_description" cols="116" rows="5">{{$contect_section->contect_description ?? ''}}</textarea>

      <small id="contect_description_help" class="text-danger ml-1"></small>
      
    </div>
    </div>
    <button type="submit" class="btn btn-success">Create / Update</button>
</form>
  </div>
</div>
        </div>
        </div>