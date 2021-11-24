@extends('adminSide.masterPage.master')

@section('title')
Tags
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a data-toggle="modal" data-target="#tagModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus-square"></i> Add Tags</a>
                    </div>




<!-- create Modal -->
<div id="tagModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form  id="addTag" >
    @csrf
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add Tags</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="exampleInputEmail1">Add Tags</label>
    <input type="text" class="form-control" id="tag_name" name="tag_name" aria-describedby="emailHelp" placeholder="Add tag...">
    <small class="text-danger" id="tag_name_help"></small>
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" >Creat</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     
      </div>
    </div>
    </form>
  </div>
</div>


 
<!-- update Modal -->
<div id="editTagModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form  id="editTag" >
    @csrf
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Edit Tag</h4>
      </div>
      <div class="modal-body">

    
    <input type="hidden" class="form-control" id="Tag_id" name="Tag_id" aria-describedby="emailHelp" >
    


      <div class="form-group">
    <label for="exampleInputEmail1">Add Tag</label>
    <input type="text" class="form-control" id="edit_tag_name" name="edit_tag_name" aria-describedby="emailHelp" placeholder="Add Catogery...">
    <small class="text-danger" id="edit_tag_name_help"></small>
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" >Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     
      </div>
    </div>
    </form>
  </div>
</div>


<!-- start data table code-->
<div class="card-body">
<table class="table table-striped table-bordered w-100" id="tags">
<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
</thead>


</table>



</div>
<!-- end data table code-->
   





@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/tag.js')}} "> </script>




@endsection
