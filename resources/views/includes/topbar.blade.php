<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars" ></a>
                <a class="navbar-brand" href="javascript:void(0);" style="display: inline-block">Admin<b>Panel</b></a>
				<div class="float-left" style="float: right; margin-top: 20px"> <a href="#" class="button-left"><span class="fa fa-bars" style="color: white"></span></a> </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
<!--                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>-->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
					
					@if(Auth::user()->role_name === 'Admin')
						<?php	
						$users = DB::table('messages')->join('users','users.id','messages.from_user')->join('employee','users.employee_id','employee.emp_id')->select('users.name','image','messages.created_at','messages.message', 'messages.id','messages.read_at')->whereRaw('messages.created_at = messages.read_at')->get()->toArray(); 
						$count = count($users);?>
			
					@if($users != null)
					
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">{{ $count }}</span>
                        </a>
                        <ul class="dropdown-menu">
							<li class="header">NOTIFICATION MAILS</li>
							
                            <li class="body">
                                <ul class="menu">
                                    
									@foreach($users as $user)
<!--
										<li style="height: 60px;">
											<div style="width: 30px; display: inline-block; margin-left: 10px; margin-top: 10px">
                                                 @if(Auth::user()->role_name === 'Employee')
          	    									<img src="{{ asset('storage/imgs/'.$users->emp_image) }}" class="icon-circle" alt="User Image" >
												 @else
													<img src="{{ asset('images/user.png') }}" class="icon-circle" alt="User Image">
												 @endif
											</div>
                                            <div class="menu-info" style="float: right; width: 220px; margin-top: 10px">
                                                <h4>{{ $user->message }}</h4>
                                                <p style="float: right; margin-right: 10px">
                                                    <i class="material-icons">access_time</i>@php 
													$mydate = $user->created_at;
														echo date("d/m/y", strtotime("$mydate"))
													@endphp
                                                </p>
                                            </div>
											
                                    	</li>										
-->
									<li>
                                        <a href="{{url('singleNotification', [$user->id])}}">
                                            <div class="icon-circle">
                                                <img src="{{ asset('storage/imgs/'.$user->emp_image) }}" class="icon-circle" alt="User Image" style="margin-bottom: 5px">
                                            </div>
                                            <div class="menu-info" style="width: 200px">
                                                <h4>{{ $user->message }}</h4>
                                                <p style="float: right; margin-right: 10px;">
                                                    <i class="material-icons">access_time</i>&nbsp;&nbsp;@php 
													$mydate = $user->created_at;
													echo date("d/m/y", strtotime("$mydate"))
													@endphp
                                                </p>
                                            </div>
                                        </a>
                                    </li>
									@endforeach 
                                </ul>
                            </li>
							
                            <li class="footer">
<!--                                <a href="javascript:void(0);">View All Notifications</a>-->
								<center><li style="margin-top: 5px; margin-bottom: 5px;"><a href="{{url('showAllNotifications')}}">Show All Notification Mails</a></li></center>
                            </li>
                        </ul>
						
                    </li>
					@endif
					@endif
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <!-- #END# Tasks -->
					
					@if(Auth::user()->role_name === 'Employee')
						<?php	
						$users = DB::table('messages')->whereRaw('messages.created_at = messages.read_at')->where('to_user', Auth::user()->id)->join('users','users.id','messages.to_user')->join('employee','users.employee_id','employee.emp_id')->select('users.name','emp_image','messages.created_at','messages.message', 'messages.id','messages.read_at')->get()->toArray(); 
						$count = count($users);?>
			
					@if($users != null)
					
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">{{ $count }}</span>
                        </a>

                        <ul class="dropdown-menu">
							<li class="header">NOTIFICATION MAILS</li>
							
                            <li class="body">
                                <ul class="menu">
                                    
									@foreach($users as $user)
									<li>
                                        <a href="{{url('singleNotification', [$user->id])}}">
                                            <div class="icon-circle">
                                                <img src="{{ asset('images/user.png') }}" class="icon-circle" alt="User Image" style="margin-bottom: 5px">
                                            </div>
                                            <div class="menu-info" style="width: 200px">
                                                <h4>{{ $user->message }}</h4>
                                                <p style="float: right; margin-right: 10px;">
                                                    <i class="material-icons">access_time</i>&nbsp;&nbsp;@php 
													$mydate = $user->created_at;
													echo date("d/m/y", strtotime("$mydate"))
													@endphp
                                                </p>
                                            </div>
                                        </a>
                                    </li>
									@endforeach 
                                </ul>
                            </li>
							
                            <li class="footer">
<!--                                <a href="javascript:void(0);">View All Notifications</a>-->
								<center><li style="margin-top: 5px; margin-bottom: 5px;"><a href="{{url('showAllNotifications')}}">Show All Notification Mails</a></li></center>
                            </li>
                        </ul>
						
                    </li>
					<script>
						$(document).ready(function() {
							window.location.href = '/empNotification';
						})
					</script>
					@endif
					@endif
					
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>