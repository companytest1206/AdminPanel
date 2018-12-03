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
<ol class="breadcrumb breadcrumb-col-blue pull-right">
        <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
        <li class="active"><i class="material-icons">attach_money</i> Salary</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="width: 580px; margin-left: 300px">
                        <div class="header bg-blue">
                            <h2>
                               Employee's Salary: &nbsp;<small>(Get employee's salary details here)</small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('/super_calculation') }}">Super Calculation</a></li>
                                        <li><a href="{{ url('/edit_salary') }}">Edit Salary Details</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="body">
                            <form action="{{ url('/salary') }}" method="post">
							@csrf
							<label for="emp_name">Name of Employee</label>
									<div class="form-group">
										<div class="form-line">
										   <select class="form-control {{ $errors->has('emp_name') ? ' is-invalid' : '' }}" name="emp_name" id="emp_name">
												<option value="">---Select employee---</option>
												@foreach($employee as $emp)
												{	
													<option value="{{$emp['emp_id']}}">{{$emp['name']}}</option>
												}
												@endforeach
											</select>
										</div>
										 @if ($errors->has('emp_name'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('emp_name') }}
										</span>
										@endif
									</div>

<!--
							<label for="">No. of working days in this month </label><br>
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Days" name="days" value="{{ $errors->has('days') ? '' : old('days') }}" id="days">
                                    	</div>
										@if ($errors->has('days'))
    									<span class="invalid-feedback" role="alert" style="color: red; display: inline-block">
      				  						{{ $errors->first('days') }}
     			 						</span>
     			 						@endif
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Hours" name="hours" value="{{ $errors->has('hours') ? '' : old('hours') }}" id="hours" readonly style="color: gray; cursor: no-drop;">
                                    	</div>
									 	@if ($errors->has('hours'))
    									<span class="invalid-feedback" role="alert" style="color: red;">
      				  						{{ $errors->first('hours') }}
     			 						</span>
     			 						@endif
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Mins" name="mins" value="{{ $errors->has('mins') ? '' : old('mins') }}" id="mins" readonly style="color: gray; cursor: no-drop;">
                                    	</div>
									 	@if ($errors->has('mins'))
    									<span class="invalid-feedback" role="alert" style="color: red; display: inline-block">
      				  						{{ $errors->first('mins') }}
     			 						</span>
     			 						@endif
                                	</div><br>
-->
						
							<label for="month">Month </label>
									<div class="form-group">
										<div class="form-line">
										   <select class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" id="month">
												<option value="">---Select month---</option>
												@foreach($months as $month)
												{	
													<option value="{{$month['cid']}}">{{$month['month']}}</option>
												}
												@endforeach
											</select>
										</div>
										 @if ($errors->has('month'))
										<span class="invalid-feedback" role="alert" style="color: red;">
											{{ $errors->first('month') }}
										</span>
										@endif
									</div>
								
							<label for="work_days">Working Days </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Select month to view working days." name="work_days" value="{{ $errors->has('work_days') ? '' : old('work_days') }}" id="work_days" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('work_days'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('work_days') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="mins_month">Working Minutes</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Select month to view total working minutes." name="mins_month" value="{{ $errors->has('mins_month') ? '' : old('mins_month') }}" id="mins_month" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('mins_month'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('mins_month') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="basic_sal">Basic Salary</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Select employee name to view his/her basic salary." name="basic_sal" value="{{ $errors->has('basic_sal') ? '' : old('basic_sal') }}" id="basic_sal" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('basic_sal'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('basic_sal') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="">Professional Tax &nbsp;( <i class="fa fa-rupee"></i> )</label><br>
								<div class="form-group" style="width: 200px; display: inline-block">
                                    	<div class="form-line">
                                         	<input type="text" class=" form-control" placeholder="Professional Tax" name="prof_tax" value="{{ $errors->has('prof_tax') ? '' : old('prof_tax') }}" id="prof_tax" readonly style="color: gray; cursor: no-drop;">
                                    	</div>
                                	</div>&nbsp;&nbsp;&nbsp;
								
								<div class="form-group" style="width: 200px; display: inline-block; margin-left: 100px">
                                    	<div class="form-line">
                                         	<input type="text" class="form-control" placeholder="Net Salary" name="net_sal" value="{{ $errors->has('net_sal') ? '' : old('net_sal') }}" id="net_sal" readonly style="color: gray; cursor: no-drop;">
                                    	</div>
									 	@if ($errors->has('net_sal'))
    									<span class="invalid-feedback" role="alert" style="color: red;">
      				  						{{ $errors->first('net_sal') }}
     			 						</span>
     			 						@endif
                                	</div>&nbsp;&nbsp;&nbsp;<br>	
														
							<label for="">On Leave </label><br>
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Days" name="ldays" value="{{ $errors->has('ldays') ? '' : old('ldays') }}" id="ldays">
                                    	</div>
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Hours" name="lhours" value="{{ $errors->has('lhours') ? '' : old('lhours') }}" id="lhours">
                                    	</div>
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Mins" name="lmins" value="{{ $errors->has('lmins') ? '' : old('lmins') }}" id="lmins">
                                    	</div>
                                	</div><br>
								
							<label for="adv_paid">Advance Paid </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Advance Paid Amount." name="adv_paid" value="{{ $errors->has('adv_paid') ? '' : old('adv_paid') }}" id="adv_paid">
                                    </div>
									 @if ($errors->has('adv_paid'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('adv_paid') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="sal_encash">Salary Encashment </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Salary Encashment Amount." name="sal_encash" value="{{ $errors->has('sal_encash') ? '' : old('sal_encash') }}" id="sal_encash">
                                    </div>
									 @if ($errors->has('sal_encash'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('sal_encash') }}
     			 					</span>
     			 					@endif
                                </div>
							
							<label for="tds_deduct">TDS Deduction </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Salary Encashment Amount." name="tds_deduct" value="{{ $errors->has('tds_deduct') ? '' : old('tds_deduct') }}" id="tds_deduct" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('tds_deduct'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('tds_deduct') }}
     			 					</span>
     			 					@endif
                                </div>
							
							<label for="pay_sal">Payable Salary</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Payable Salary" name="pay_sal" value="{{ $errors->has('pay_sal') ? '' : old('pay_sal') }}" id="pay_sal" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('pay_sal'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('pay_sal') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<input type="submit" class="btn btn-primary" value="Submit" style="width: 80px; margin-left: 20px;">
							
							<script>
								
								$('#emp_name').on('change', function(event) {
									var x = $(this).val();
									//console.log(x);
									$.get("{{ url('api/getSalary')}}", 
										  { id: x }, 
										  function(data) {
										//console.log(data)
										$('#basic_sal').val(data);
									    
										//console.log($('#basic_sal').html());
										//console.log($('#mins_month').val().substring(0,$('#mins_month').val().length - 4));
										if($('#basic_sal').val() < 6000)
										{
											$('#prof_tax').val('-');
										}
										if($('#basic_sal').val() > 6000 && $('#basic_sal').val() < 8999)
										{
											$('#prof_tax').val(80);
										}
										if($('#basic_sal').val() > 9000 && $('#basic_sal').val() < 11999)
										{
											$('#prof_tax').val(150);
										}
										if($('#basic_sal').val() > 12000)
										{
											$('#prof_tax').val(200);
										}
										if($('#prof_tax').val() == '-')
										{
											$('#net_sal').val($('#basic_sal').val());
											$('#pay_sal').val($('#net_sal').val());
										}
										else
										{
											$('#net_sal').val($('#basic_sal').val() - $('#prof_tax').val());
											$('#pay_sal').val($('#net_sal').val());
										}
									});
									window.paysal = $('#pay_sal').val();
								});
								
								$('#month').on('change', function(event) {
									var x = $(this).val();
									console.log(x);
									$.get("{{ url('api/details')}}", 
										  { id: x }, 
										  function(data) {
										console.log(data);
										$.each(data, function(index, element) {
											console.log(element.work_days);
											$('#work_days').val(element.work_days);
											$('#mins_month').val(element.mins_month);
								 		});
								});
									window.paysal = $('#pay_sal').val();
								});
								
//								$('#days').on('keyup', function(event) {
//									work_days();
//								})
								
								$('#ldays').on('input', function(event) {
									leave_days();
								})
								
								$('#lhours').on('input', function(event) {
									leave_hours();
								})
								
								$('#lmins').on('input', function(event) {
									leave_mins();
								})
								
//								function work_days(){
//									var days = $('#days').val();
//									console.log(days);
//									const day = 1;
//									if(day)
//									{ 
//										var hours = 8; 
//										var mins = 480; 
//									}
//									hours = days * hours;
//									mins = days * mins;
//									$('#hours').val(hours);
//									$('#mins').val(mins);
//								}
								
								function leave_days(){
									var ldays = $('#ldays').val();
									//console.log(ldays);
									const day = 1;
									if(day)
									{ 
										var lhours = 8; 
										var lmins = 480; 
									}
									lhours = ldays * lhours;
									lmins = ldays * lmins;
									$('#lhours').val(lhours);
									$('#lmins').val(lmins);
									
									var rs_per_min = $('#basic_sal').val() / $('#mins_month').val().substring(0,$('#mins_month').val().length - 4);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#lmins').val() * rs_per_day) / 480;
									$('#pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));
									window.paysal = $('#pay_sal').val();
								}
								
								function leave_hours(){
									var lhours = $('#lhours').val();
									//console.log(days);
									const hours = 8;
									if(hours)
									{ 
										var ldays = 1; 
										var lmins = 480; 
									}
									ldays = lhours / hours;
									lmins = lhours * 60;
									$('#ldays').val(ldays);
									$('#lmins').val(lmins);
									
									var rs_per_min = $('#basic_sal').val() / $('#mins_month').val().substring(0,$('#mins_month').val().length - 4);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#lmins').val() * rs_per_day) / 480;
									$('#pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));
									window.paysal = $('#pay_sal').val();
								}
								
								function leave_mins(){
									var lmins = $('#lmins').val();
									//console.log(days);
									const mins = 480;
									if(lmins)
									{ 
										var ldays = 1; 
										var lhours = 8; 
									}
									ldays = (lmins / 60) / lhours;
									lhours = lmins / 60;
									$('#lhours').val(lhours);
									$('#ldays').val(ldays);
									
									var rs_per_min = $('#basic_sal').val() / $('#mins_month').val().substring(0,$('#mins_month').val().length - 4);
									//console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#lmins').val() * rs_per_day) / 480;
									$('#pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));
									window.paysal = $('#pay_sal').val();
								}
								
								$(document).ready(function() {
									window.paysal =  $('#pay_sal').val();
								})
								
								$('#adv_paid').on('input', function() {
									var value = window.paysal - $(this).val();
									$('#pay_sal').val(value);
								})
								
								$('#sal_encash').on('input', function() {
									var val1 = (isNaN(parseInt(window.paysal))) ? 0 : parseInt(window.paysal);
									var val2 = (isNaN(parseInt($(this).val()))) ? 0 : parseInt($(this).val());
									var value = val1 + val2;
									$('#pay_sal').val(value);						  
								})
								
						</script>
							</form>	
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