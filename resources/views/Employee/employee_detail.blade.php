@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/editable-table/mindmup-editabletable.js') }}"></script>
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
    <li><a href="/employees"><i class="material-icons">person</i> Employees</a></li>
    <li class="active"><i class="material-icons">person_outline</i> Employee's details</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2 style="display: inline-block;">
                               Employee's Details: &nbsp;<small>(Specific employee's details)</small>
                            </h2>
							<a class="btn bg-light-green" href="{{ url('employees/edit',[$employee->emp_id]) }}" style="float: right"><i class="fa fa-pencil"></i> Edit employee details</a>
							<a class="btn bg-orange pull-right" href="{{ url('employees/delete',[$employee->emp_id]) }}" style="float: right; margin-right: 70px"><i class="fa fa-close"></i> Delete employee details</a>
							
							<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('employees/edit',[$employee->emp_id]) }}">Edit employee details</a></li>
                                        <li><a href="{{ url('employees/delete',[$employee->emp_id]) }}">Delete employee details</a></li>									
                                    </ul>
                                </li>
                            </ul>
-->
                        </div>
                        <div class="body table-responsive">

                            <table class="table table-hover" id="mainTable">
								<tr>
                  					<th>Image</th><td><img src="{{ asset('storage/imgs/' . $employee->image) }}" class="img-circle" width="70px" height="70px"></td>
								</tr>
                                <tr>
             			     		<th>Name</th><td>{{$employee->name}}</td>
								</tr>
								<tr>
                  					<th>Address</th><td>{{$employee->perm_address}}</td>
								</tr>
								<tr>
                  					<th>Contact No.</th><td>{{$employee->contact_no1}} @if($employee->contact_no2 != null),&nbsp;&nbsp;{{$employee->contact_no2}}@endif</td>
								</tr>
								<tr>
                  					<th>Email ID</th><td>{{$employee->emailId}}</td>
								</tr>
								<tr>
                  					<th>Designation</th><td>{{$employee->designation}}</td>
								</tr>
								@if($employee->training_period != 'NULL')
								<tr>
                  					<th>Training Period</th><td>{{$employee->training_period}} months</td>
								</tr>
								@endif
								@if($employee->training_end_date != 'NULL')
								<tr>
                  					<th>Training End Date</th><td>{{$employee->training_end_date}}</td>
								</tr>
								@endif
								<tr>
									<th>Joining Date</th><td>{{ date('d-m-Y', strtotime($employee->joining_date)) }}</td>
								</tr>
								<tr>
                  					<th>Bond Period</th><td>{{$employee->bond_period}}</td>
								</tr>
								<tr>
                  					<th>Probation Period</th><td>{{$employee->probation_period}} months</td>
								</tr>
								<tr>
                  					<th>Probation End Date</th><td>{{ date('d-m-Y', strtotime($employee->probation_end_date)) }}</td>
								</tr>
								<tr>
                  					<th>Bond End Date</th><td>{{ date('d-m-Y', strtotime($employee->bond_end_date)) }}</td>
								</tr>
								<tr>
                  					<th>Salary</th><td>{{$employee->salary}}</td>
								</tr>
								<tr>
                  					<th>Confirmation Date</th><td>{{ date('d-m-Y', strtotime($employee->confirmation_date)) }}</td>
								</tr>
								<tr>
                  					<th>DOB</th><td>{{ date('d-m-Y', strtotime($employee->DOB)) }}</td>
								</tr>
								<tr>
                  					<th>Marital Status</th><td>{{$employee->marital_status}}</td>
								</tr>
								<tr>
                  					<th>Family Members</th><td>{{$employee->family_members}}</td>
								</tr>
								<tr>
                  					<th>Remarks</th><td>{{$employee->remarks}}</td>
								</tr>

              				</table>
							
						<script>
						
//						$(function () {
//							$('#mainTable').editableTableWidget();
//						});
							
//						$(document).on('click', '.button', function (e) {
//							//e.preventDefault();
//							var id = $(this).data('id');
//							console.log(id);
//							swal({
//									title: "Are you sure you want to this employee?",
//									text: "This employee will be deleted from your database permenantly!",
//									type: "warning",
//									showCancelButton: true,
//									confirmButtonColor: "#DD6B55",
//									confirmButtonText: "Yes, delete it!",
//									closeOnConfirm: false
//								}, function () {													
//									$.post("{{url('employees/delete')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
//										location.reload();
//										console.log(data);
//										window.location = "/employees";
////										swal("Deleted!", 'Employee has been deleted successfully.!', "success");
//									}).fail(function(xhr, status, error) {
//										console.log(xhr);
//									})
//								});
//						});
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