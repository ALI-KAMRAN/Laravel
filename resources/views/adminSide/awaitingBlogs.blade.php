@extends('adminSide.masterPage.master')

@section('title')
Awaiting Blogs
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Awaiting Blogs</h1>
                        <a href="{{url('creatBlog')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus-square"></i> Add Blog</a>
                    </div>






<!-- start data table code-->
<div class="card-body">
<table class="table table-striped table-bordered w-100" id="awaitingBlogsAdmin">
<thead>
    <tr>
       <th scope="col">Image</th>
        <th scope="col">ID</th>
        <th scope="col">User</th>
         <th scope="col">Category</th>
        <th scope="col">Name</th>
        <th scope="col">Short Description</th>
 
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Publish</th>
    </tr>
</thead>


</table>



</div>
<!-- end data table code-->
   





@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/awaitingBlogsAdmin.js')}} "> </script>




@endsection
