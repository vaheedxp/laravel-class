@extends('layouts.main')

@section('content')

<h1 class="pull-left"> Send Email</h1> 
<a href="{{asset('/')}}" class="btn btn-primary pull-right">Back</a>
<div class="col-lg-12">

<form action="{{asset('students/send')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">To</label>
    <input 
      type="email" 
      class="form-control" 
      id="email" 
      placeholder="Enter the email please" 
      name="email">
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input 
      type="text" 
      class="form-control" 
      id="subject" 
      placeholder="Enter the Subject please" 
      name="subject">
  </div>

   <div class="form-group">
    <label for="message">Message</label>
      <textarea 
          class="form-control" 
          rows="10" 
          id="message" 
          cols="10"
          name="message"
          placeholder="Enter your  message please"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
</div>



@endsection