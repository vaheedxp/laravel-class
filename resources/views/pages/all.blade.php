@extends('layouts.main')

@section('content')

<?php 
	if(Session::has('alertmessage')):
		echo Session::get('alertmessage');
	endif;
?>

<h1 class="pull-left">Students</h1> 
<a href="{{asset('students/addform')}}" class="btn btn-primary pull-right">
							Create
						</a> 
<a 
	href="{{asset('students/sendemail')}}"  style="margin-right: 10px; display: inline-block;" 
	class="btn btn-primary pull-right">Send Email
</a>
  
<table class="table">
			<thead> 
				<tr> 
					<th>{{trans('student.id')}}</th> 
					<th>{{trans('student.first_name')}}</th> 
					<th>{{trans('student.last_name')}}</th> 
					<th>Phone</th> 
					<th>Edit</th>
					<th>Delete</th>
					<th>View All</th>
				</tr> 
			</thead> 
			<tbody> 
			@if(count($data['students'])>1)
				@foreach($data['students'] as $st)
				<tr> 
					<td>{{$st->id}}</td> 
					<td>{{$st->name}}</td> 
					<td>{{$st->lastname}}</td> 
					<td>{{$st->phone}}</td>
					<td>
						<a 
							href="#" 
							class="btn btn-primary edit_buttons"
							data-toggle="modal" 
							data-pk="{{$st->id}}"
							data-target="#editModal">
							Edit
						</a>
					</td>
					<td>
						<a 
							href="#" 
							class="btn btn-danger delete_link"
							data-toggle="modal" 
							data-target="#deletdialog"
							data-rid="{{$st->id}}">
							Delete
						</a>
					</td>
					<td>
						<a href="{{asset('students/detail').'/'.$st->id}}" class="btn btn-success">
							View all info
						</a>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="4">Sorry, no students found</td>
				</tr>
			@endif
			</tbody> 
		</table>


@endsection


<!-- Modal -->
<div id="deletdialog" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Student</h4>
      </div>
      <div class="modal-body">
        <h1>Are you sure to delete this record?</h1>
      </div>
      <div class="modal-footer">
        <button 
        	type="button" 
        	class="btn btn-success" 
        	data-dismiss="modal">No</button>

        <a href="#" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>


<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Student</h4>
      </div>
      <img src="{{asset('/images/loader.gif')}}" id="edit_loader">
      <div class="modal-body" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@section('customscripts')
	<script type="text/javascript">

		var APP_URL = {!! json_encode(url('/')) !!}

		$(document).on('click','.delete_link', function(){
				var id= $(this).data('rid');
				var href = "{{asset('students/delete').'/'}}"+id;
				$("div#deletdialog a").attr("href",href);
		})

		// edit modal

		$(document).on("click",'a.edit_buttons', function(){
			/*
			$.ajax({
					method:"get",
					url: 'students/updateform/'+$(this).data("pk"),
					dataType:'html',
					success: function(response){
							$("#editModal .modal-body").html(response);
					},
					error: function(){
							alert("Error");
					}
			});
			*/

			$("#editModal .modal-body").hide();
			$("#edit_loader").show();


			$.get({
					url: ''+APP_URL+'/students/updateform/'+$(this).data("pk"),
					dataType:'html',
					success: function(response){
							$("#edit_loader").hide();
							$("#editModal .modal-body").html(response);
							$("#editModal .modal-body").show();
					},
					error: function(){
							alert("Error");
					}
			});
		});
	</script>
@endsection