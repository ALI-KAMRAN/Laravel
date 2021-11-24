@extends('frondEnd.masterPage.master')

@section('title')
Contect Page
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>{{$contect->contect_heading ?? ''}}</h1>
            <span class="subheading">{{$contect->contect_short_description ?? ''}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>{{$contect->contect_description ?? ''}}</p>
       


        <form name="sentMessage" id="contactForm" >
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name"  >
              <p class="help-block text-danger" id="name_help"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" name="email" id="email"  >
              <p class="help-block text-danger" id="email_help"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" name="phone_num" id="phone_num"  >
              <p class="help-block text-danger" id="phone_num_help"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message"  ></textarea>
              <p class="help-block text-danger" id="message_help"></p>
            </div>
          </div>
          <br>
        
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Contect Us</button>
        </form>
      </div>
    </div>
  </div>

  <hr>

@endsection


@section('scripts')
<script type="text/javascript" src=" {{asset('js/submitForm.js')}} "> </script>
@endsection








