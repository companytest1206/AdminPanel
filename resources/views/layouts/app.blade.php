<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
<!--
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
-->
	
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap Core Css -->
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	
	<!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
	
	<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
	
	<link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet">
   
	<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
    <!-- Morris Chart Css-->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
	
	<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
	
<!--	<link rel="stylesheet" type="text/css" href="{{ asset('closify-master/css/style.css') }}">-->
	
<!--	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />-->
<!--	<link href="{{ asset('material-bootstrap-wizard-master/assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />-->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	.sidebar.fliph {
   		 width: 55px;transition: all 0.5s  ease-in-out;
	}
	.fc-unthemed td .fc-today{
   		background-color: deepskyblue;
	}
	.fc-highlight {
  		background: rgba(3, 169, 244, 0.5); 
	}
	.fc-sun {
    	color: red !important;
	}
	.fc-sat {
    	color: blue !important;
	}
	.event-highlight{
 		background-color: floralwhite;
</style>
	</style>
</head>

<body class="theme-indigo">
  <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	 @yield('content')
<!--	 margin: 90px 10px 0 70px;-->
	<script>
		$(document).ready(function(){
			$('.button-left').click(function(){
				$('.sidebar').toggleClass('fliph');
				var name = $('.name').html();
				if($('#leftsidebar').hasClass('fliph'))
				{
					$('section.content').css('margin','90px 10px 0 70px');
					$('section.content').css('transition','all 0.5s  ease-in-out');
					$('.user-info').css('padding','0');
					$('.img-circle').css('width','40px');
					$('.img-circle').css('height','40px');
					//$('.name').html(name.charAt(0)+''+name.substr(name.indexOf(" ") + 1).charAt(0));
					//console.log(name.charAt(0)+''+name.substr(name.indexOf(" ") + 1).charAt(0));
					//$('.email').css('display','none');
					$('.img-circle').css('margin','5px');
				}
				else
				{
					$('section.content').css('margin','90px 15px 0 280px');
					$('section.content').css('transition','all 0.5s  ease-in-out');
					$('.user-info').css('padding','13px 15px 12px 15px');
					$('.img-circle').css('width','50px');
//					$('.name').html(name);
//					$('.email').css('display','block');
					$('.img-circle').css('height','50px');
					$('.img-circle').css('margin','');
				}
			});
		});
	</script>
	
	<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	
	<!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <!-- Bootstrap Core Js -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
	<!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	
	<!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

	<!-- Autosize Plugin Js -->
	<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

	<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
	
	<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
	
	<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
	
	<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
<!--
    <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js') }}"></script>
-->

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/index.js') }}"></script>
	
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/jquery-steps/jquery.steps.js') }}"></script>
	<script src="{{ asset('js/pages/forms/form-wizard.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
	<script src="{{ asset('js/pages/ui/notifications.js') }}"></script>
	
	<!--DataTables Js-->
	<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
	
<!--
	<script language="javascript" type="text/javascript" src="{{ asset('closify-master/js/jquery-1.11.1.min.js') }}" ></script>
	<script language="javascript" type="text/javascript" src="{{ asset('closify-master/js/jquery-ui.min.js') }}" ></script>
	<script language="javascript" type="text/javascript" src="{{ asset('closify-master/js/closify-min.js') }}" ></script>
	<script language="javascript" type="text/javascript" src="{{ asset('closify-master/js/custom.js') }}" ></script>
	
-->
	
<!--	<script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>-->
<!--	<script src="{{ asset('js/pages/forms/advanced-form-elements.js') }}"></script>-->
	
<!--

    <script src="{{ asset('material-bootstrap-wizard-master/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('material-bootstrap-wizard-master/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('material-bootstrap-wizard-master/assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

	<script src="{{ asset('material-bootstrap-wizard-master/assets/js/material-bootstrap-wizard.js') }}"></script>

	<script src="{{ asset('material-bootstrap-wizard-master/assets/js/jquery.validate.min.js') }}"></script>
-->
	
<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>-->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

</body>

</html>
