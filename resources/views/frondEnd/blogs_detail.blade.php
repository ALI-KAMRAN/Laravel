@extends('frondEnd.masterPage.master')

@section('meta')
{{$blog->meta ?? ''}}
@endsection


@section('title')
Blog Details
@endsection


@section('style')

@endsection


@section('content')
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$blog->title ?? ''}}</h1>
            

            <span class="meta">Category :
              {{$blog->category->name ?? ''}}
              </span>


            <span class="meta">Tags :
              @foreach($blog->tags as $tag)
            <a href="#" class="badge badge-info">  {{ $tag->name ?? '' }}</a>
              @endforeach
              </span>

              <span class="meta">Views:
         
            <a href="#" class="badge badge-info">  {{ $views ?? '' }}</a>
            
              </span>



            <span class="meta">Posted by
              {{$blog->user->name ?? ''}}
              on {{Carbon\Carbon::parse($blog->created_at)->format('F d,Y')}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
         
<div class="text-center">
          <blockquote class="blockquote">{{ $blog->short_description ?? '' }}</blockquote></div>
<div class="text-center">
         <a href="#">
            <img class="img-fluid rounded" style="width: 400px;height: 400px" src="{{asset('/images/blogsImages/'.$blog->image)}}" 
            alt="{{$blog->image_alt ?? ''}}">
          </a>
          </div>
<div class="text-center">
<p>{!! $blog->description ?? '' !!}</p>
</div>

 
        </div>
 </div>
    </div>
  </article>
</div>
    </div>

 <hr>

    <div class="container">
      <div class="row">
    @if($recentBlogs)
    @foreach($recentBlogs as $recentBlogs)
<div class="card" style="width: 18rem;margin: 45px;">
  <img class="card-img-top" src="{{asset('/images/blogsImages/'.$recentBlogs->image)}}" alt="Card image cap" style="height: 300px;">
  <div class="card-body">
    <h5 class="card-title">{{$recentBlogs->title}}</h5>
    <p class="card-text">{{ Str::words($recentBlogs->short_description,10)}}</p>
    <a href="{{ url('blogDetails/'.$recentBlogs->id) }}" class="btn btn-primary">Read More</a>
  </div>
</div>
@endforeach
@endif
   
  </div>
</div>

  <hr>






@endsection


@section('scripts')

@endsection








