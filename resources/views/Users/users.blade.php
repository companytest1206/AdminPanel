@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
@include('includes.topbar')
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>
<ol class="breadcrumb breadcrumb-col-blue-grey pull-right">
        <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
        <li class="active"><i class="material-icons">person</i> Users</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
<!--								<label class="label label-warning" style="float: right; margin-right: 20px">Company</label>-->
                               User's Details: &nbsp;<small>(Only users details are viewed here and can be accessed here)</small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('users/new') }}">Add New User</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Sr No.</th>
                  					<th>Name</th>
                  					<th>Address</th>
                  					<th>Phone</th>
                  					<th>Username</th>
                  					<th>Role</th>
                  					<th>Email</th>
                  					<th>Created At</th>
                  				<th colspan="2"><center>Actions</center></th>
                                </thead>
                                <tbody>
                                @php
									$i = $users->perPage() * ($users->currentPage()-1);
								@endphp
								@if($users === [])
				 					<tr><td colspan="7"><center>No records available</center></td></tr>
								@else
								@foreach($users as $user)
                				<tr>
                  					<td>{{++$i}}</td>
                  					<td>{{$user->name}}</td>
                  					<td>{{$user->address}}</td>
                  					<td>{{$user->phone}}</td>
                  					<td>{{$user->username}}</td>
				  					<td><label class="label label-warning">{{$user->role_name}}</label></td>
                  					<td>{{$user->email}}</td>
                  					<td>{{$user->created_at}}</td> 
                  					<td><a href="{{ url('users/edit',[$user->id]) }}" class="btn btn-primary"><i class="material-icons" style="margin-bottom: 5px">edit</i></a></td>
				  					<td>
									<form method="POST" >
										<input type="hidden" id="_token" value="{{ csrf_token() }}">
										{{ csrf_field() }}
										<a class="btn btn-danger button" data-id="{{$user->id}}"><i class="material-icons" style="margin-bottom: 5px">delete</i></a>
									</form>
									</td>
				  				</tr>
				  				@endforeach
				  				@endif
                                </tbody>
                            </table>
							<center>{{$users->links()}}</center><!-- or {{$users->links()}}-->
						<script>
							$(document).on('click', '.button', function (e) {
							//e.preventDefault();
							var id = $(this).data('id');
							console.log(id);
							swal({
									title: "Are you sure you want to this user?",
									text: "This user will be deleted from your database permenantly!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {													
									$.post("{{url('users/delete')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
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