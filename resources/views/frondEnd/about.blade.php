@extends('frondEnd.masterPage.master')

@section('title')
Home Page
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>{{$about->about_heading ?? ''}}</h1>
            <span class="subheading">{{$about->about_short_description ?? ''}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        {{$about->about_description ?? ''}}
      </div>
    </div>
  </div>

  <hr>
@endsection


@section('scripts')

@endsection








