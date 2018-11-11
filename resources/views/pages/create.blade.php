@extends('layouts.main')

@section('content')

<h1 class="pull-left"> Add Students</h1> 
<a href="{{asset('/')}}" class="btn btn-primary pull-right">Back</a>
<div class="col-lg-12">

<form action="{{asset('students/create')}}" method="post">
  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter student name" name="name">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter student lastname" name="lastname">
  </div>

   <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter student phone" name="phone">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



@endsection