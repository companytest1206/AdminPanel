@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
@include('includes.topbar')
<script>
	$(document).ready(function() {
			
    $("#ckbCheckedAll").change(function() {
	
        if (this.checked) {
            $(".ckbChecked").each(function() {
                this.checked=true;
            });
        } else {
            $(".ckbChecked").each(function() {
                this.checked=false;
            });
        }
    });

    $(".ckbChecked").click(function () {
		
        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".ckbChecked").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            });
			
		 if (isAllChecked == 0) {
                $("#ckbCheckedAll").prop("checked", true);
            }     
        }
        else {
            $("#ckbCheckedAll").prop("checked", false);
        }
    });
});
</script>
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>
<ol class="breadcrumb breadcrumb-col-blue pull-right">
    <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
    <li class="active"><i class="material-icons">assessment</i> Activity Log</li>
</ol>
<section class="content">
	<div class="content-wrapper">
	<div class="container">
	<h1>Log Activity Lists</h1>
	<table class="table table-hover">
		<tr>
<!--
			<th>
				<form name="form" id= "form" action = "{{url('/delete')}}" method="post">
				<input type="hidden" name="_method" value="DELETE">
          			<div class="checkbox icheck">
            		<label>
						<input type="checkbox" name= "ckbCheckedAll" id= "ckbCheckedAll">
            		</label>
          			</div>
			</th>
-->
			<th>No</th>
			<th>Subject</th>
			<th>URL</th>
			<th>Method</th>
			<th>IP</th>
			<th>User Agent</th>
			<th>User Name</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
		@php
			$i = $logs->perPage() * ($logs->currentPage()-1);
		@endphp
			@foreach($logs as $key => $log)
			<tr>
				
<!--				<td><input type="checkbox" id="check" name="check[]" class="ckbChecked" value="{{ $log->id }}"></td>-->
				<td>{{ ++$i }}</td>
				<td>{{ $log->subject }}</td>
				<td class="text-success">{{ $log->url }}</td>
				<td><label class="label label-info">{{ $log->method }}</label></td>
				<td class="text-warning">{{ $log->ip }}</td>
				<td class="text-danger">{{ $log->agent }}</td>
				<td>{{ $names[$key] }}</td>
				<td>{{ $log->created_at }}</td>
				<td><form method="POST" >
						<input type="hidden" id="_token" value="{{ csrf_token() }}">
						{{ csrf_field() }}
						<a class="btn btn-danger button" data-id="{{$log->id}}"><i class="material-icons" style="margin-bottom: 5px">delete</i></a>
					</form></td>
			</tr>
			@endforeach
	</table>
<center>{{$logs->links()}}</center><!-- or {{$logs->links()}}-->
				<script>
					$(document).on('click', '.button', function (e) {
							//e.preventDefault();
							var id = $(this).data('id');
							console.log(id);
							swal({
									title: "Are you sure you want to this log?",
									text: "This log info will be deleted from your database permenantly!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {													
									$.post("{{url('deleteLog')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
										location.reload();
										console.log(data);
//										swal("Deleted!", 'Employee has been deleted successfully.!', "success");
									}).fail(function(xhr, status, error) {
										console.log(xhr);
									})
								});
						});
				</script>
</div>
  </div>
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  			    @if(Session::has('alert-' . $msg))
					<script>
						$(document).ready( function() {
							//swal("Deleted!", 'Company has been deleted successfully.!', "success");
							var colorName = "bg-black";
							var text = "{{ Session::get('alert-' . $msg) }}";
							var placementFrom = "bottom";
							var placementAlign = "center";
							var animateEnter = "";
							var animateExit = "";
														
							showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
						});	
					</script>
				@endif
   			 @endforeach
</section>