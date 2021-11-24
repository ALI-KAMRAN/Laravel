<div class="card shadow mb-4"> 
   <!-- Card Header - Accordion -->
    <a href="#footer" class="d-block card-header py-3" data-toggle="collapse"
    role="button" aria-expanded="true" aria-controls="footer">
     <h6 class="m-0 font-weight-bold text-primary">Footer</h6>
      </a>
    <!-- Card Content - Collapse -->
    <div class="collapse " id="footer">
       <div class="card-body">
        <div class="card-body">
<form action="" id="footerCms" method="post" enctype='multipart/form-data'>

@csrf
<input type="hidden" name="footer_section_name" id="footer_section_name" value="{{$footer_section->section_name ?? ''}}">

 <div class="form-row">
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="title">Twitter</label>
      <input type="text"  class="form-control" id="twitter" name="twitter" placeholder="www.twitter.com/Profile" value="{{$footer_section->twitter ?? ''}}">
     
      <small id="twitter_help" class="text-danger ml-1"></small>
      
    </div>
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="url">FaceBook</label>
      <input type="text"  class="form-control" placeholder="www.facebook.com/Profile" name="facebook" id="facebook" value="{{$footer_section->facebook ?? ''}}">
      
      <small id="facebook_help" class="text-danger ml-1"></small>
      
    </div>
  </div>

<div class="form-row">
<div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="url">Instagram</label>
      <input type="text"  class="form-control" placeholder="www.instagram.com/Profile" name="instagram" id="instagram" value="{{$footer_section->instagram ?? ''}}">
   
      <small id="instagram_help" class="text-danger ml-1"></small>
      
    </div>
  </div>
    <button type="submit" class="btn btn-success">Create / Update</button>
</form>
  </div>
 </div>
        </div>
        </div>