@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

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
    <li class="active"><i class="material-icons">person</i> Employees</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2 style="display: inline-block">
                               Employee Details: &nbsp;<small>(Only employees details are viewed here and can be accessed here)</small>
                            </h2>
							<a class="btn bg-cyan" href="{{ url('employees/new') }}" style="float: right"><i class="fa fa-plus"></i> Add New employee</a>
						
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('employees/new') }}">Add New employee</a></li>
                                    </ul>
                                </li>
                            </ul>
-->
                        </div>
						<div class="body">
                            <div class="table-responsive">
								@php
									$i = 0;
								@endphp
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" align="center" id="employees" width="2000px">
                                    <thead>
                                        <tr>
											<th><center>Sr.No</center></th>
											<th><center>Image</center></th>
                                            <th><center>Name</center></th>
                                            <th><center>Designation</center></th>
                                            <th><center>Address</center></th>
                                            <th><center>Contact No</center></th>
											<th><center>Email ID</center></th>
                                            <th><center>Joining Date</center></th>
                                            <th><center>Bond Period</center></th>
                                            <th><center>Salary</center></th>
                                            <th><center>Remarks</center></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th><center>Sr.No</center></th>
											<th><center>Image</center></th>
                                            <th><center>Name</center></th>
                                            <th><center>Designation</center></th>
                                            <th><center>Address</center></th>
                                            <th><center>Contact No</center></th>
											<th><center>Email ID</center></th>
                                            <th><center>Joining Date</center></th>
                                            <th><center>Bond Period</center></th>
                                            <th><center>Salary</center></th>
                                            <th><center>remarks</center></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										@if($employees === [])
				 						<tr><td colspan="6"><center>No records available</center></td></tr>
										@else
										@foreach($employees as $emp)
                                        <tr class="table-tr" data-url="{{ url('/employee_detail', [$emp->emp_id]) }}" style="cursor: pointer;">
											<td align="center">{{ ++$i }}</td>
											<td align="center" width="60px"><img src="{{ asset('storage/imgs/' . $emp->image) }}" class="img-circle" width="50px" height="50px"></td>
                                            <td align="center" width="150px">{{ $emp->name }}</td>
                                            <td align="center" width="150px">{{ $emp->designation }}</td>
                                            <td align="center" width="330px">{{ $emp->perm_address }}</td>
                                            @if($emp->contact_no2 != null)
												<td align="center" width="200px">{{$emp->contact_no1}},<br>{{$emp->contact_no2}}</td>
											@else
												<td align="center" width="200px">{{$emp->contact_no1}}</td>
											@endif
											<td align="center">{{$emp->emailId}}</td>
											<td align="center" width="100px">{{ date('d-m-Y', strtotime($emp->joining_date)) }}</td>
                                            <td align="center">{{$emp->bond_period}}</td>
                                            <td align="center">{{$emp->salary}}</td>
                                            <td align="center" width="300px">{{$emp->remarks}}</td>
                                        </tr>
										@endforeach
				  						@endif
                                    </tbody>
                                </table>
								
								<script>
									$(function() {
										$('table#employees').on("click", "tr.table-tr", function() {
											window.location = $(this).data("url");
										});
									});
								</script>
                            </div>
                        </div>
						
						<!--
                        <div class="body table-responsive">
                            <table class="table table-hover">
		
								@if($employees === [])
				 					<tr><td colspan="7"><center>No records available</center></td></tr>
								@else
								@foreach($employees as $emp)
								<style>
									.a {
    									transition: color 0.3s ease-in-out;
									}
									.a:hover {
    										opacity: 0.5;
											transition: .5s ease;
											background-color: whitesmoke
									}
								</style>
								
								<a class="col-lg-4 col-md-4 col-sm-8 col-xs-12" href="{{ url('/employee_detail', [$emp->emp_id]) }}">
          	          				<div class="card a" style="height: 170px">
										<div style="display: inline-block">
											<img src="{{ asset('storage/imgs/' . $emp->image) }}" width="150px" height="170px">
										</div>
                        				<div class="content" style="width: 180px; float: right;">
							
                            				<div style="font-family:  'Franklin Gothic Bold', 'Arial Black', 'sans-serif' ">{{$emp->name}}</div>
								
                            				<div>{{$emp->designation}}</div>
											
                            				<div>{{$emp->contact_no1}}</div>
											
											@if($emp->contact_no2 != null)
												<div>{{$emp->contact_no2}}</div>
											@endif
								
                            				<div>{{$emp->emailId}}</div>
                        				</div>
                   					</div>
                				</a>

								
								
								
								@endforeach
				  				@endif
              				</table>
						<script>
						$(document).on('click', '.button', function (e) {

							var id = $(this).data('id');
							console.log(id);
							swal({
									title: "Are you sure you want to this employee?",
									text: "This employee will be deleted from your database permenantly!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {													
									$.post("{{url('employees/delete')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
										location.reload();
										console.log(data);									
									}).fail(function(xhr, status, error) {
										console.log(xhr);
									})
								});
							});
						</script>
                		</div>
-->
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
