@extends('layouts.main')

@section('content')

<h1 class="pull-left">Students</h1> 
<a href="{{asset('/')}}" class="btn btn-primary pull-right">
							Back
						</a>  
<table class="table">
			<thead> 
				<tr> 
					<td>ID</td> 
					<td>{{$data['student']->id}}</td>
				</tr> 

				<tr> 
					<td>First Name</td> 
					<td>{{$data['student']->name}}</td>
				</tr> 

				<tr> 
					<td>Lastname</td> 
					<td>{{$data['student']->lastname}}</td>
				</tr> 

				<tr> 
					<td>Phone</td> 
					<td>{{$data['student']->phone}}</td>
				</tr> 

			</thead> 
			
		</table>


@endsection