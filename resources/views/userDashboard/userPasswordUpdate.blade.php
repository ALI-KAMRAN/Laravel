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
    <h5 class="card-header">Update Password</h5>
<div class="card-body">
<form action="{{url('userPasswordUpdate')}}" method="post" enctype='multipart/form-data'>

@csrf
 <div class="form-row">
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="old_password">Old Password:</label>
      <input type="password"  class="form-control" id="old_password" name="old_password"  value="">
      @if(session()->has('error'))
      <small class="text-danger ml-1">{{session()->get('error')}}</small>
      @endif
    </div>
    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="password">New Password:</label>
      <input type="password"  class="form-control" id="password" name="password"  value="">
      @if($errors->has('password'))
      <small class="text-danger ml-1">{{$errors->first('password')}}</small>
      @endif
    </div>

    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <label for="password_confirmation">Confim Password:</label>
      <input type="password"  class="form-control" id="password_confirmation" name="password_confirmation"  value="">
      @if($errors->has('password_confirmation'))
      <small class="text-danger ml-1">{{$errors->first('password_confirmation')}}</small>
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



<script type="text/javascript">

 // swal fire on record save
      var success = "{{ session('success') ?? '' }}";
      setTimeout(function() {
        
      
      if(success !== ''){
        Swal.fire({
          icon : 'success',
          title : 'Success',
          text : 'Password update successfully',
        })
      }
    }, 500);
</script>


@endsection
