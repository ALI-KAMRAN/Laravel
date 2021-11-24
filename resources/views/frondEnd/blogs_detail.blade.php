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

<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}



.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>



<div class="card">
  <img src="{{asset('/images/blogsImages/'.$blog->image)}}" alt="Denim Jeans" style="width:100%">
   <h1>{{$blog->title ?? ''}}</h1>

  <p>{{ $blog->short_description ?? '' }}.</p>
  <p><button><span class="meta">Posted by
              {{$blog->user->name ?? ''}}
              on {{Carbon\Carbon::parse($blog->created_at)->format('F d,Y')}}</span></button></p>
</div>

</body>
</html>










<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
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

  <hr>
@endsection


@section('scripts')

@endsection








