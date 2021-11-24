@extends('adminSide.masterPage.master')

@section('title')
View Users
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>




 

<!-- start data table code-->
<div class="card-body">
<table class="table table-striped table-bordered w-100" id="users">
<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
             <th scope="col">Email</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Delete</th>
    </tr>
</thead>


</table>



</div>
<!-- end data table code-->
   





@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/users.js')}} "> </script>




@endsection
