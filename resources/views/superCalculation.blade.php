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
        <li><a href="/salary"><i class="material-icons">attach_money</i> Salary</a></li>
        <li class="active"><i class="material-icons">content_paste</i> Super Calculation</li>
</ol>
<section class="content">
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form action="{{ url('/super_calculation') }}" method="post">
				@csrf
					<div class="card" style="width: 580px; display: inline-block; margin-left: 20px;">
                        <div class="header bg-blue">
                            <h4>
								Super Salary Calculation
                            </h4>

                        </div>
                        <div class="body">
                           
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
							
							<label for="total_mins_month">Total Working Minutes </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Select Month to get total working minutes." name="total_mins_month" value="{{ $errors->has('total_mins_month') ? '' : old('total_mins_month') }}" id="total_mins_month" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('total_mins_month'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('total_mins_month') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="work_days">Working Days </label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Working days (Eg. 10)." name="work_days" value="{{ $errors->has('work_days') ? '' : old('work_days') }}" id="work_days">
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
														
							<label for="">On Leave</label><br>
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
							
							<script>
								
								$('#emp_name').on('change', function(event) {
									var x = $(this).val();
									//console.log(x);
									$.get("{{ url('api/getSalary')}}", 
										  { id: x }, 
										  function(data) {
										//console.log(data)
										$('#basic_sal').val(data);
									    
										$('#pay_sal').val($('#basic_sal').val());
										
									});
									window.paysal = $('#pay_sal').val();
								});
								
								$('#month').on('change', function(event) {
									var x = $(this).val();
									//console.log(x);
									$.get("{{ url('api/details')}}", 
										  { id: x }, 
										  function(data) {
										//console.log(data);
										$.each(data, function(index, element) {
											//console.log(element.work_days);
											$('#total_mins_month').val(element.mins_month);
								 		});
								});
									window.paysal = $('#pay_sal').val();
								});
								
								$('#work_days').on('input', function(event) {
									$('#mins_month').val($(this).val() * 480 + ' min.');
									var rs_per_min = $('#basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									//console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									//console.log(rs_per_day);
									var final_deduction = ($('#mins_month').val().substring(0,$('#mins_month').val().length - 4) * rs_per_min);
									//console.log(final_deduction)
									//console.log($('#basic_sal').val() - final_deduction);
									$('#pay_sal').val(Math.floor(final_deduction));
								})
								
								$('#ldays').on('input', function(event) {
									leave_days();
								})
								
								$('#lhours').on('input', function(event) {
									leave_hours();
								})
								
								$('#lmins').on('input', function(event) {
									leave_mins();
								})
								
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
									
									var rs_per_min = $('#basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									//console.log(rs_per_min);	
									var rs_per_day = 480 * rs_per_min;
									//console.log(rs_per_day);	
									var final_deduction = ($('#lmins').val() * rs_per_min);
									//console.log(final_deduction);	
									$('#pay_sal').val(Math.floor($('#pay_sal').val() - final_deduction));
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
									//console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									//console.log(rs_per_day);
									var final_deduction = ($('#lmins').val() * rs_per_day) / 480;
									//console.log($('#pay_sal').val() - final_deduction);
									$('#pay_sal').val(Math.floor($('#pay_sal').val() - final_deduction));
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
									
									var rs_per_min = $('#pay_sal').val() / $('#mins_month').val().substring(0,$('#mins_month').val().length - 4);
									//console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#lmins').val() * rs_per_day) / 480;
									$('#pay_sal').val(Math.floor($('#pay_sal').val() - final_deduction));
									window.paysal = $('#pay_sal').val();
								}
								
								$(document).ready(function() {
									window.paysal =  $('#pay_sal').val();
								})
								
						</script>
								
						</div>
                    </div>
					
                    <div class="card" style="width: 580px; float: right; margin-right: 20px;">
                        <div class="header bg-blue">
                            <h4>
                              	(For Salary Scale Change Or Stipend Change Employees.)
                            </h4>
                        </div>
                        <div class="body">
							
							<label for="new_basic_sal">Basic Salary (After Period Change)</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="New Basic Salary after period change (E.g 10000)." name="new_basic_sal" value="{{ $errors->has('new_basic_sal') ? '' : old('new_basic_sal') }}" id="new_basic_sal">
                                    </div>
									 @if ($errors->has('new_basic_sal'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('new_basic_sal') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="new_work_days">Working Days (After Period Change)</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Working days after period change in this month." name="new_work_days" value="{{ $errors->has('new_work_days') ? '' : old('new_work_days') }}" id="new_work_days">
                                    </div>
									 @if ($errors->has('new_work_days'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('new_work_days') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<label for="new_mins_month">Working Minutes (After Period Change)</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Working minutes after period change (select working days after period change first)." name="new_mins_month" value="{{ $errors->has('new_mins_month') ? '' : old('new_mins_month') }}" id="new_mins_month" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('new_mins_month'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('new_mins_month') }}
     			 					</span>
     			 					@endif
                                </div>
								
								<label for="">Professional Tax &nbsp;( <i class="fa fa-rupee"></i> )</label><br>
								<div class="form-group" style="width: 200px; display: inline-block">
                                    	<div class="form-line">
                                         	<input type="text" class=" form-control" placeholder="Professional Tax" name="prof_tax" value="{{ $errors->has('prof_tax') ? '' : old('prof_tax') }}" id="prof_tax">
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
														
							<label for="">On Leave (After Period Change)</label><br>
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Days" name="nldays" value="{{ $errors->has('nldays') ? '' : old('nldays') }}" id="nldays">
                                    	</div>
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Hours" name="nlhours" value="{{ $errors->has('nlhours') ? '' : old('nlhours') }}" id="nlhours">
                                    	</div>
                                	</div>&nbsp;&nbsp;&nbsp;		
									<div class="form-group" style="width: 70px; display: inline-block">
                                    	<div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Mins" name="nlmins" value="{{ $errors->has('nlmins') ? '' : old('nlmins') }}" id="nlmins">
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
							
							<label for="new_pay_sal">Payable Salary (After Period Change)</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Payable Salary" name="new_pay_sal" value="{{ $errors->has('new_pay_sal') ? '' : old('new_pay_sal') }}" id="new_pay_sal" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('new_pay_sal'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('new_pay_sal') }}
     			 					</span>
     			 					@endif
                                </div>
							
							<label for="final_pay_sal">Final Payable Salary (After Period Change)</label>
								<div class="form-group">
                                    <div class="form-line">
                                         <input type="text" class=" form-control" placeholder="Final Payable Salary" name="final_pay_sal" value="{{ $errors->has('final_pay_sal') ? '' : old('final_pay_sal') }}" id="final_pay_sal" readonly style="color: gray; cursor: no-drop;">
                                    </div>
									 @if ($errors->has('final_pay_sal'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('final_pay_sal') }}
     			 					</span>
     			 					@endif
                                </div>
								
							<input type="submit" class="btn btn-primary" value="Submit" style="width: 80px; margin-left: 20px;">
							
							<script>
								
								$('#prof_tax').on('input', function(event) {
									
										if($(this).val() != '-' || $(this).val() != '')
										{
											$('#net_sal').val($('#net_sal').val() - $(this).val());
											$('#new_pay_sal').val($('#net_sal').val());
										}
									
									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
									window.paysal = $('#new_pay_sal').val();
								});
								
								$('#new_basic_sal').on('input', function() {
									$('#net_sal').val($(this).val());
									$('#new_pay_sal').val($('#net_sal').val());

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
								})
								
								$('#new_work_days').on('input', function() {
									$('#new_mins_month').val(($(this).val() * 480)+' min.');
									
									var rs_per_min = $('#new_basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									console.log(rs_per_day);
									var final_deduction = ($('#new_mins_month').val().substring(0,$('#new_mins_month').val().length - 4) * rs_per_min);
									console.log(final_deduction)
									//console.log($('#basic_sal').val() - final_deduction);
									$('#new_pay_sal').val(Math.floor(final_deduction));
									$('#net_sal').val(Math.floor(final_deduction));
									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
								})
								
								$('#nldays').on('input', function(event) {
									nleave_days();
								})
								
								$('#nlhours').on('input', function(event) {
									nleave_hours();
								})
								
								$('#nlmins').on('input', function(event) {
									nleave_mins();
								})
								
								
								function nleave_days(){
									var ldays = $('#nldays').val();
									//console.log(ldays);
									const day = 1;
									if(day)
									{ 
										var lhours = 8; 
										var lmins = 480; 
									}
									lhours = ldays * lhours;
									lmins = ldays * lmins;
									$('#nlhours').val(lhours);
									$('#nlmins').val(lmins);
									
									var rs_per_min = $('#new_basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#nlmins').val() * rs_per_day) / 480;
									$('#new_pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
		
									window.paysal = $('#new_pay_sal').val();
								}
								
								function nleave_hours(){
									var lhours = $('#nlhours').val();
									//console.log(days);
									const hours = 8;
									if(hours)
									{ 
										var ldays = 1; 
										var lmins = 480; 
									}
									ldays = lhours / hours;
									lmins = lhours * 60;
									$('#nldays').val(ldays);
									$('#nlmins').val(lmins);
									
									var rs_per_min = $('#new_basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#nlmins').val() * rs_per_day) / 480;
									$('#new_pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
									window.paysal = $('#new_pay_sal').val();
								}
								
								function nleave_mins(){
									var lmins = $('#nlmins').val();
									//console.log(days);
									const mins = 480;
									if(lmins)
									{ 
										var ldays = 1; 
										var lhours = 8; 
									}
									ldays = (lmins / 60) / lhours;
									lhours = lmins / 60;
									$('#nlhours').val(lhours);
									$('#nldays').val(ldays);
									
									var rs_per_min = $('#new_basic_sal').val() / $('#total_mins_month').val().substring(0,$('#total_mins_month').val().length - 4);
									//console.log(rs_per_min);
									var rs_per_day = 480 * rs_per_min;
									var final_deduction = ($('#nlmins').val() * rs_per_day) / 480;
									$('#new_pay_sal').val(Math.floor($('#net_sal').val() - final_deduction));

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
									window.paysal = $('#new_pay_sal').val();
								}
								
								$(document).ready(function() {
									window.paysal =  $('#new_pay_sal').val();
								})
								
								$('#adv_paid').on('input', function() {
									var value = window.paysal - $(this).val();
									$('#new_pay_sal').val(value);

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
								})
								
								$('#sal_encash').on('input', function() {
									var val1 = (isNaN(parseInt(window.paysal))) ? 0 : parseInt(window.paysal);
									var val2 = (isNaN(parseInt($(this).val()))) ? 0 : parseInt($(this).val());
									var value = val1 + val2;
									$('#new_pay_sal').val(value);	

									$('#final_pay_sal').val(parseInt($('#pay_sal').val()) + parseInt($('#new_pay_sal').val()));
								})
								
						</script>
								
						</div>
                    </div>
				</form>
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