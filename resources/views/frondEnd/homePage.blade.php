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
          <a href="{{ url('blogDetails/'.$blog->id) }}">
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
        @if(!$loop->last)
        <hr>
       @endif
      @endforeach

      <!-- Pager -->
  


   
<!--  pagination code -->

      <div class="col-12">
<nav aria-label="pagination">
  <ul class="pagination justify-content-center">
  {{ $blogs->links() }} 
</ul>
</nav>
 </div>


 <hr>
<h4 class="card-title">Popular Blogs</h4>
<hr>
<div class="row">
  <div class="col-sm-12 col-ml-12 mx-auto">
@foreach($allBlogs as $individualBlog)
@foreach($popularBlogs as $pb)
@if($individualBlog->id == $pb->blog_id)
<a href="{{ url('/blogDetails/'.$individualBlog->id) }}">
<button type="button" class="btn btn-primary">
{{ $individualBlog->title ?? '' }} <span class="badge badge-light">{{$pb->count ?? ''}}</span>
</button>
</a>

@endif
@endforeach
@endforeach

  </div>
</div>
         



</div>
</div>
 </div>



<div id="watch-leftside">
<a href="https://api.whatsapp.com/send?phone=+923034546393&text=Hi you can chat with your Lawyer on WhatsApp Please Click on Cntinue to Chat if you don,t have WhatsApp then download it and try again THANK YOU!"
onclick="gtag('event','WhatsApp',{'event_action':'Whatsapp_chat','event_category':'Chat','event_label':'Chat_WhatsApp'
});"target="_blank">  
<img src="{{url('img/whatsapp.png')}}" width="70px" style="float:right;" class="whatsapp_float_btn whatsapp_float" >
</a>
</div>



<hr>

<style type="text/css">
  .w-5{
    display: none;
  }
  .whatsapp_float{
    position: fixed;
    bottom: 40px;
    right: 20px;
  }

</style>

@endsection


@section('scripts')

@endsection








