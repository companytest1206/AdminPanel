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
<ol class="breadcrumb breadcrumb-col-blue pull-right">
    <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
    <li class="active"><i class="material-icons">account_box</i> Your Profile</li>
</ol>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="content">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
  margin-top: 100px;
}

.title {
  color: grey;
  font-size: 16px;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
@if(Auth::user()->role_name == 'Admin')
<div class="card">
  <img src="{{ asset('images/user.png') }}" alt="User Image" width="100%">
  <h3>{{ Auth::user()->name }}</h3>
  <p class="title">{{ Auth::user()->role_name }}</p>
	
	<!--<ul class="list-group list-group-unbordered">
        <li class="list-group-item">
			<p><strong>Address:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->address }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->phone }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Username:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->username }}</p>
        </li>
        <p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
   </ul>-->
	
  <p>Address: <strong>{{ Auth::user()->address }}</strong></p>
  <p>Phone: <strong>{{ Auth::user()->phone }}</strong></p>
  <p>Username: <strong>{{ Auth::user()->username }}</strong></p>
  <p>Email: <strong>{{ Auth::user()->email }}</strong></p><br>
	
	<!--
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
-->
	
<p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
</div>
@elseif( Auth::user()->role_name === 'Company' )
<div class="card">
  <img src="{{ asset('images/user.png') }}" alt="User Image" width="100%">
  <h3>{{ Auth::user()->name }}</h3>
  <p class="title">{{ Auth::user()->role_name }}</p>
	
	<!--
	<ul class="list-group list-group-unbordered">
        <li class="list-group-item">
			<p><strong>Address:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->address }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->phone }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Username:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->username }}</p>
        </li>
        <p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
   </ul>
-->
	
  <p>Company URL: <strong>{{ $comp }}</strong></p>
  <p>Address: <strong>{{ Auth::user()->address }}</strong></p>
  <p>Phone: <strong>{{ Auth::user()->phone }}</strong></p>
  <p>Username: <strong>{{ Auth::user()->username }}</strong></p>
  <p>Email: <strong>{{ Auth::user()->email }}</strong></p><br>
	
	<!--
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
-->
	
<p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
</div>
@elseif(Auth::user()->role_name === 'Team')
<div class="card">
  <img src="{{ asset('images/user.png') }}" alt="User Image" width="100%">
  <h3>{{ Auth::user()->name }}</h3>
  <p class="title">{{ Auth::user()->role_name }}</p>
	
	<!--
	<ul class="list-group list-group-unbordered">
        <li class="list-group-item">
			<p><strong>Address:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->address }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->phone }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Username:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->username }}</p>
        </li>
        <p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
   </ul>
-->
	
  <p>Company this team belongs: <strong>{{ $comp }}</strong></p>
  <p>Address: <strong>{{ Auth::user()->address }}</strong></p>
  <p>Phone: <strong>{{ Auth::user()->phone }}</strong></p>
  <p>Username: <strong>{{ Auth::user()->username }}</strong></p>
  <p>Email: <strong>{{ Auth::user()->email }}</strong></p><br>
	
	<!--
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
-->
	
<p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
</div>
@else
<div class="card">
  <img src="{{  asset('storage/imgs/'. $emp->emp_image) }}" alt="User Image" width="100%">
  <h3>{{ Auth::user()->name }}</h3>
  <p class="title">{{ Auth::user()->role_name }}</p>
	
	<!--
	<ul class="list-group list-group-unbordered">
        <li class="list-group-item">
			<p><strong>Address:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->address }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->phone }}</p>
        </li>
        <li class="list-group-item">
            <p><strong>Username:</strong>&nbsp;&nbsp;&nbsp;{{ Auth::user()->username }}</p>
        </li>
        <p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
   </ul>
-->
	
  <p>Address: <strong>{{ Auth::user()->address }}</strong></p>
  <p>Phone: <strong>{{ Auth::user()->phone }}</strong></p>
  <p>Username: <strong>{{ Auth::user()->username }}</strong></p>
  <p>Gender: <strong>{{ $emp->emp_gender }}</strong></p>
  <p>Company employee works: <strong>{{ $comp->comp_name }}</strong></p>
  <p>Team employee belongs: <strong>{{ $team->team_name }}</strong></p>
  <p>Designation: <strong>{{ $designation[0]->designation }}</strong></p>
  <p>Salary: <strong>{{ $emp->emp_salary }}</strong></p>
  <p>Email: <strong>{{ Auth::user()->email }}</strong></p><br>
	
	<!--
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
-->
	
<p><a href="/update/profile" class="btn bg-black waves-effect waves-light" style="width: 100%">Update Profile</a></p>
</div>
@endif
	
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
