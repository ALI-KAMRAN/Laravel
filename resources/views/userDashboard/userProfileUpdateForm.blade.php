@extends('userDashboard.masterPage.master')

@section('title')
Profile Updae
@endsection


@section('style')


</style>
@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 ml-3 text-gray-800">User Dashboard   </h1> </div>

<div class="container">
                    <div class="row">
<div class="offset-md-3 col-xl-6 col-lg-6">
  <div class="card shadow mb-4">
<div class="card-body">
<form action="{{url('userprofileUpdate')}}" method="post" enctype='multipart/form-data'>

@csrf
 <div class="form-row">
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="username">Username:</label>
      <input type="text"  class="form-control" id="username" name="username"  value="{{$user->name ?? ''}}">
      @if($errors->has('username'))
      <small class="text-danger ml-1">{{$errors->first('username')}}</small>
      @endif
    </div>
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="email">Email:</label>
      <input type="text"  class="form-control" id="email" name="email"  value="{{$user->email}}">
      @if($errors->has('email'))
      <small class="text-danger ml-1">{{$errors->first('email')}}</small>
      @endif
    </div>
  </div>
<button type="submit" class="btn btn-success">Update</button>
</form>


</div>
</div>
</div>

</div>

 </div>
@endsection


@section('scripts')

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

 // swal fire on record save
      var success = "{{ session('success') ?? '' }}";
      setTimeout(function() {
        if(success !== ''){
        Swal.fire({
          icon : 'success',
          title : 'Success',
          text : 'Profie updated successfully',
        })
      }
    }, 500);
</script>


@endsection
