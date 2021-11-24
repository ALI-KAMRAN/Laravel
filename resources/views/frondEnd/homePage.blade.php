@extends('frondEnd.masterPage.master')

@section('title')
Home Page
@endsection


@section('style')
  
  
  
 
@endsection


@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  
  <div class="container">
  
    <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($blogs as $blog)
      
        <div class="post-preview">
          <a href="{{ url('/home/blogDetails/'.$blog->url) }}">
            <h2 class="post-title">
            {{ Str::words($blog->title, 10,'...')}}
            </h2>
            <h3 class="post-subtitle">
              {{ Str::words($blog->short_description, 20,'...')}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$blog->user->name}}</a>
            {{ Carbon\carbon::parse($blog->created_at)->format('F d, Y')}}</p>
        </div>
       
      @endforeach

      <!-- Pager -->
  



</div>
     </div>
      </div>
   <hr>
@endsection


@section('scripts')

@endsection








