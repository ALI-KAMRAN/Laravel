@extends('adminSide.masterPage.master')

@section('title')
CMS
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">CMS</h1>
                         </div>


 @include('adminSide.otherFiles.aboutCms')

@include('adminSide.otherFiles.contectCms')

  @include('adminSide.otherFiles.footerCms')    


@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/aboutCms.js')}} "> </script>
<script type="text/javascript" src=" {{asset('js/contectCms.js')}} "> </script>
<script type="text/javascript" src=" {{asset('js/footerCms.js')}} "> </script>
@endsection
