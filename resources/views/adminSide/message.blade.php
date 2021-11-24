@extends('adminSide.masterPage.master')

@section('title')
Message
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>





<!-- show detail contact message -->
<div id="messageDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">

    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Contact Message View</h4>
      </div>
      <div class="modal-body">

      <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" readonly="">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" readonly="">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Phone Number</label>
    <input type="text" class="form-control" id="phone_num" name="phone_num" aria-describedby="emailHelp" readonly="">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Message</label>
    <textarea class="form-control" id="message" name="message" rows="10" cols="87" style="resize: none;" readonly=""></textarea>
   </div>
</div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     
      </div>
    </div>
    </form>
  </div>
</div>





<!-- start data table code-->
<div class="card-body">
<table class="table table-striped table-bordered w-100" id="messages">
<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Num</th>
          <th scope="col">Message</th>
        <th scope="col">Created At</th>
         <th scope="col">View</th>
      <th scope="col">Delete</th>
    </tr>
</thead>


</table>



</div>
<!-- end data table code-->
   





@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/contectUs.js')}} "> </script>




@endsection
