@extends('adminSide.masterPage.master')

@section('title')
Blogs
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="{{ url('creatBlog')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus-square"></i> Add Blog</a>
                    </div>







<!-- start data table code-->
<div class="card-body">
<table class="table table-striped table-bordered w-100" id="blogs">
<thead>
    <tr>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Cagegory</th>
        <th scope="col">Short Description</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
</thead>


</table>



</div>
<!-- end data table code-->
   





@endsection


@section('scripts')
 <script type="text/javascript" src=" {{asset('js/blogs.js')}} "> </script>




@endsection
