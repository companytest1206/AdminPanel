@extends('layouts.app')
<link href="{{ asset('Multi-File-Uploader-jQuery-uploadHBR/dist/css/style.min.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
</script>
<script src="{{ asset('Multi-File-Uploader-jQuery-uploadHBR/dist/js/uploadHBR.min.js') }}"></script>

@include('includes.topbar')
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>

<!--
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
-->
<ol class="breadcrumb breadcrumb-col-blue pull-right">
    <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
    <li><a href="/employees"><i class="material-icons">person</i> Employees</a></li>
    <li class="active"><i class="material-icons">person_add</i> Add Employee</li>
</ol>
<section class="content">
<div class="body">
	<form role="form" action="{{ url('/employees/new') }}" id="myform" method="post" enctype="multipart/form-data">
		@csrf
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="col-md-12 col-lg-12 col-xs-12" id="columns">
        <div id="uploads"><!-- Upload Content --></div>
      </div>
      <div class="clearfix"></div>
      <button class="btn btn-danger btn-lg pull-left" id="reset" type="button" ><i class="fa fa-history"></i> Clear</button>
      <button class="btn btn-primary btn-lg pull-right" type="submit" ><i class="fa fa-upload"></i> Upload </button>
    </div>
  </div>
</form>
<script>
	$('#myform').submit(function(e) {
		console.log($('#hidden_0').val());
		//e.preventDefault(e);
	})
	uploadHBR.init({
		"target": "#uploads",
		"textNew": "<center>ADD</center>",
		"max": 1,
	});
	
	$('#reset').click(function () {
  		uploadHBR.reset('#uploads');
	});
</script>
</div>

</section>