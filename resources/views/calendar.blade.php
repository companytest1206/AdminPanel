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

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card" style="margin-top: 100px;">
                <div class="header" style="background: deepskyblue;"><center><strong><h4 style="color: white;">CALENDAR DETAILS</h4></strong></center></div>

                <div class="body">
                     <div id='calendar'></div><br>
                   <center><button class="btn bg-light-blue waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                         Monthly leave Information
                   </button></center>
                   <center><div class="collapse" id="collapseExample" style="width: 500px">
                     <div class="well">
						 
					  <form method="POST" action="{{ url('/calendar') }}" enctype="multipart/form-data" id="myform">
						 @csrf
                      <div style="display: inline-block;">
						<h5 style="display: inline-block;">No. of Days =</h5>
						<div id="festdiv" class="form-group" style="width: 80px; display: inline-block; margin-left: 5px; color: deepskyblue">
                            	<h5><input type="text" class=" form-control" name="total_days" id="total_days" style="color: deepskyblue; font-size:15px;" readonly></h5>
                     	</div>
					  </div>
					  <div style="display: inline-block; margin-left: 90px"><h5 style="display: inline-block;">No. of Sundays =</h5>
						 <div id="festdiv" class="form-group" style="width: 70px; display: inline-block; margin-left: 5px; color: deepskyblue">
                            <h5><input type="text" class="form-control" name="total_sundays" id="total_sundays" style="color: deepskyblue; font-size:15px;" readonly></h5>
                     	 </div>
					  </div>
						 
					 <h5 style="display: inline-block;">Saturday off =</h5>
					 <div id="festdiv" class="form-group" style="width: 230px; display: inline-block; margin-left: 5px; color: deepskyblue">
                        <div class="form-line" style="width:200px;">
							<select class=" form-control" name="sat_off"  id="sat_off">
											
							</select>
                        </div>
                     </div>
						  
					<p><center style="color: deepskyblue">(Click on dates in calendar to select festival off dates!)</center></p>
					 <h5 style="display: inline-block; margin-left: 10px;">Festival off =</h5>
					 <div class="form-group" style="width: 250px; display: inline-block; margin-left: 5px; color: deepskyblue" id="fest">
						<div  id="fl">
						</div>
                     </div>
						  
					 <input type="hidden" class="form-control" name="month" id="month" readonly>
					 <h5 style="display: inline-block;">No. of Working days =</h5>
						  <div id="festdiv" class="form-group" style="width: 70px; display: inline-block; margin-left: 5px; color: deepskyblue">
                            	<h5><input type="text" class="form-control" name="work_days" id="work_days" style="color: deepskyblue; font-size:15px;" readonly></h5>
                     	 </div>
					 <h5 style="display: inline-block; margin-left: 10px;">Working Minutes =</h5>
						 <div id="festdiv" class="form-group" style="width: 100px; display: inline-block; margin-left: 5px; color: deepskyblue">
                            	<h5><input type="text" class="form-control" value="480 min/day." name="mins_per_day" id="mins_per_day" style="color: deepskyblue; font-size:15px;" readonly></h5>
                     	 </div>
					 <h5 style="display: inline-block; ">Total no. of Working Minutes of this month =</h5>
						  <div id="festdiv" class="form-group" style="width: 100px; display: inline-block; margin-left: 5px; color: deepskyblue">
                            	<h5><input type="text" class="form-control" name="mins_month" id="mins_month" style="color: deepskyblue; font-size:15px;" readonly></h5>
                     	 </div><br>
						 	
					 <div id="buttons"></div>
					 </form>
                     </div>
                   </div></center><br>
					
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  			    @if(Session::has('alert-' . $msg))
					<script>
						$(document).ready( function() {
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
 
                </div>
			</div>
        </div>
    </div>
</div>

<script>	

   $(document).ready(function() {
	   window.workdays = $('#work_days').val().substring(0,2);
	   window.quantity = $('.fc-event').length;

            $('#calendar').fullCalendar({
				left:   'Calendar',
                center: '',
                right:  'today prev,next',
				selectable: true,
				displayEventTime: false,
				events: [ 
					<?php if($sat_offs != null){
					foreach($sat_offs as $sat_off){ 
					if($sat_off != null){?>
        			{
						title: 'Saturday Off',
						start: new Date('{{ $sat_off }}'),
						allDay: false,
						backgroundColor: '#8BC34A',
						borderColor: '#8BC34A'
					}, 
					<?php }}} ?>
					<?php
					for($i = 0; $i < count($new_fests); $i ++){?>
					{
						title: 'Festival Off',
						start: new Date('{{ $new_fests[$i] }}'),
						allDay: false,
						backgroundColor: '#FFC107',
						borderColor: '#FFC107'
					},  
					<?php }?>
				],
				viewRender: function (view, element) {
					var date = view.intervalStart;
					var month = date.format('MM');
					var year = date.format('YYYY');
					var days = new Date(year, month, 0).getDate();
					console.log(date);
					$('#total_days').val(days + ' days.');
					
					var sundays = [ (8 - (new Date( month + '/01/' + year ).getDay())) % 7 ];
					for ( var i = sundays[0] + 7; i < days; i += 7 ) {
						sundays.push( i );		
					}
					$('#total_sundays').val(sundays.length + ' days.');
					var td = $('#total_days').val().substring(0,2);
					var ts = $('#total_sundays').val().substring(0,2);
					$('#work_days').val(td - ts + ' days.');
					$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
					$('#month').val($('.fc-left').text());
					
				},
				select: function(start, end){
					var date = moment(start).format('DD MMMM YYYY');
					var rowLen =  $('#fest input').length;
					if(rowLen>9)
					{
						alert("No more festive holidays a month can have than 9!");
					}
					else
					{
						var newdiv = $('<br><div id="fl'+ rowLen +'"><div class="form-line" style="width:200px; display: inline-block;" ><input type="text" class=" form-control" placeholder="Date of Festivals off" name="fest_off[]" value="'+ date +'" id="fest_off'+ rowLen +'" style="color: deepskyblue;"></div><a href="#" class="delete" id="remove" style="display: inline-block; margin-left: 10px;"><i class="fa fa-close"></i></a><br>');
								
						$("#fest").append(newdiv); 
					}
					
					var w = $('#work_days').val().substring(0,2);
					var fw = parseInt(w) - 1;
					$('#work_days').val(fw + ' days.');
					$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
					
					rowLen++;
				},
				eventRender: function(eventObj, $el, view) {
//					$el.popover({
//						title: eventObj.title,
//						content: eventObj.description,
//						trigger: 'hover',
//						placement: 'top',
//						container: 'body'
//					});
					if(!eventObj.start.isBetween(view.intervalStart, view.intervalEnd)) { return false; }
				},
				eventAfterAllRender : function(view) {
					$(".fc-event-container").each(function(){

						var weekDayIndex = $(this).index();
						var row = $(this).closest(".fc-row");
						var date = row.find(".fc-day-top").eq(weekDayIndex).attr("data-date");
						row.find(".fc-day").eq(weekDayIndex)
							.addClass("event-highlight");
					});
					
					var quantity = $('.fc-event').length;
					window.quantity = quantity;
					if(quantity > 0)
					{
						$('#buttons').empty();
						$('#buttons').append('<button type="submit" class="btn bg-light-green waves-effect" id="update"><i class="fa fa-edit" style="margin-bottom: 5px"></i> &nbsp;<strong>Update</strong></button>');
						$('#myform').attr('action','{{ url("/updatecalendar") }}');
						var date = view.intervalStart;
						var month = date.format('MM');
						var year = date.format('YYYY');
						var days = new Date(year, month, 0).getDate();
		   				var saturdays = [ (7 - (new Date( month + '/01/' + year ).getDay())) % 7 ];
						for ( var i = saturdays[0] + 7; i < days; i += 7 ) {
							saturdays.push( i );		
						}
						var t = $('.fc-left').text();
						//console.log(saturdays);
						<?php foreach($sat_offs as $sat_off){?>
						if ('{{ $sat_off }}'.indexOf(t) != -1) 
						{
							var sat = '<?php echo $sat_off; ?>';
						}
						<?php } ?>
						$('#sat_off').empty();
						$('#sat_off').append($(document.createElement("option")).
											 attr("value","").text("Saturdays of this month"));
					
						var monthNames = ["January", "February", "March", "April", "May", "June",
									"July", "August", "September", "October", "November", "December"
						];
							var mon = monthNames[new Date(sat).getMonth()]+' '+new Date(sat).getFullYear();
								if(mon.indexOf(t) != -1)
								{
									for (var i=0;i<saturdays.length;i++){
										var option = '';
										var t = $('.fc-left').text();
										if(saturdays[i]+' '+t == sat)
										{
											option += '<option id="'+ saturdays[i]+' '+t + '" value="'+ saturdays[i]+' '+t + '" style="color: deepskyblue;" selected>' + saturdays[i]+' '+t + '</option>';
										}
										else
										{
											option += '<option id="'+ saturdays[i]+' '+t + '" value="'+ saturdays[i]+' '+t + '" style="color: deepskyblue;">' + saturdays[i]+' '+t + '</option>';
										}
									
										$('#sat_off').append(option);
									}
									$('#sat_off').selectpicker('refresh');
									
									var w = $('#work_days').val().substring(0,2);
									var fw = parseInt(w) - 1;
									//console.log(fw);
									$('#work_days').val(fw + ' days.');
									$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
								}
								else
								{
									$('#sat_off').empty();
									$('#sat_off').append($(document.createElement("option")).
														 attr("value","").text("Saturdays of this month"));
									for (var i=0;i<saturdays.length;i++){
										var option = '';
										var t = $('.fc-left').text();;
										if(saturdays[i] != 0)
										{
											option += '<option value="'+ saturdays[i]+' '+t + '" style="color: deepskyblue;">' + saturdays[i]+' '+t + '</option>';
										}
										$('#sat_off').append(option);
									}
									
									$('#sat_off').selectpicker('refresh');
								}
						

						var rowLen =  $('#fest input').length;
						
						$('#fest').empty();
						<?php foreach($new_fests as $fest){?>
						var fests = '<?php echo $fest; ?>';
						if(fests != null)
						{
							var date = '<?php echo count(array_filter(str_split($fest),'is_numeric')); ?>';
						
							if(date == 6)
							{
								var fest = '<?php echo substr($fest, 3);?>';
									if(fest.trim() == t)
									{
										var counter = 1;
										var newdiv = $('<br><div id="fl'+ rowLen +'"><div class="form-line" style="width:200px; display: inline-block;" ><input type="text" class=" form-control" placeholder="Date of Festivals off" name="fest_off[]" value="{{ $fest }}" id="fest_off'+ rowLen +'" style="color: deepskyblue;"></div><a class="delete" id="remove" style="display: inline-block; margin-left: 10px; cursor: pointer;"><i class="fa fa-close"></i></a><br>');							
										$("#fest").append(newdiv);
										
										var w = $('#work_days').val().substring(0,2);
										var fw = parseInt(w) - counter;
		
										$('#work_days').val(fw + ' days.');
										$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
										counter++;
									}
								rowLen++;
							}
							if(date == 5)
							{
								var fest = '<?php echo substr($fest, 2);?>';
			
									if(fest.trim() == t)
									{
						
										var counter = 1;
										var newdiv = $('<br><div id="fl'+ rowLen +'"><div class="form-line" style="width:200px; display: inline-block;" ><input type="text" class=" form-control" placeholder="Date of Festivals off" name="fest_off[]" value="{{ $fest }}" id="fest_off'+ rowLen +'" style="color: deepskyblue;"></div><a href="#" class="delete" id="remove" style="display: inline-block; margin-left: 10px;"><i class="fa fa-close"></i></a><br>');							
										$("#fest").append(newdiv);
										

										var w = $('#work_days').val().substring(0,2);
										var fw = parseInt(w) - counter;
				
										$('#work_days').val(fw + ' days.');
										$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
										counter++;
									}
								rowLen++;
							}
						}
						
						else
						{
							var w = $('#work_days').val().substring(0,2);
							var fw = parseInt(w) - 1;
							$('#work_days').val(fw + ' days.');
							$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
						}
						<?php } ?>
					window.workdays = $('#work_days').val().substring(0,2);	
					window.previousValue=$("#festdiv select").val();
					}
					if(quantity == 0)
					{
						$('#buttons').empty();
						$('#fest').empty();
						$('#buttons').append('<button type="submit" class="btn bg-light-green waves-effect" id="save"><i class="fa fa-calendar-check-o" style="margin-bottom: 5px"></i> &nbsp;<strong>Save</strong></button>');
						
						var date = view.intervalStart;
						var month = date.format('MM');
						var year = date.format('YYYY');
						var days = new Date(year, month, 0).getDate();
						
						var saturdays = [ (7 - (new Date( month + '/01/' + year ).getDay())) % 7 ];
						for ( var i = saturdays[0] + 7; i < days; i += 7 ) {
							saturdays.push( i );		
						}
						$('#myform').attr('action','{{ url("/calendar") }}');
						$('#sat_off').empty();
						$('#sat_off').append($(document.createElement("option")).
											 attr("value","").text("Saturdays of this month"));
						for (var i=0;i<saturdays.length;i++){
							if(saturdays[i] != 0)
							{
								var option = '';
								var t = $('.fc-left').text();
								option += '<option value="'+ saturdays[i]+' '+t + '" style="color: deepskyblue;">' + saturdays[i]+' '+t + '</option>';
								$('#sat_off').append(option);
							}
						}
						$('#sat_off').selectpicker('refresh');
						
						window.workdays = $('#work_days').val().substring(0,2);
					
					}
					
				}
				
              });

	   				function satoff() {
						var d = $('#total_days').val().substring(0,2);
						var s = $('#total_sundays').val().substring(0,2);
						var len = $('#fest > *').length;
						if(len > 0)
						{
							var f = parseInt(d) - parseInt(s) - (len/2) - 1;
						}
						console.log(f);
						$('#work_days').val(f + ' days.');
						$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
					}
	   				
	   				$('#sat_off').on('change', function() {	
						if(window.previousValue != '')
						{
							if($(this).val() == '')
							{
								var w = $('#work_days').val().substring(0,2);
								var fw = parseInt(w) + 1;
								$('#work_days').val(fw + ' days.').trigger('change');
								$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.').trigger('change');
							}
							if($(this).val() != '')
							{
								$('#work_days').val(window.workdays+' days.');
								console.log(window.workdays);
								$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.').trigger('change');
							}
						}
						if(window.previousValue == '')
						{
							if($(this).val() == '')
							{
								$('#work_days').val(window.workdays+' days.');
								$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.').trigger('change');
								
							}
							if($(this).val() != '')
							{
								satoff();
							}
						}
						if(window.quantity == 0)
						{
							if($(this).val() == '')
							{
								$('#work_days').val(window.workdays+' days.');
								$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.').trigger('change');
								
							}
							if($(this).val() != '')
							{
								var w = $('#work_days').val().substring(0,2);
//								console.log(w);
								var fw = parseInt(w) - 1;
								//console.log(fw);
								$('#work_days').val(fw + ' days.').trigger('change');
//								console.log($('#work_days').val());
								$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.').trigger('change');
							}
						}
					});	
	   
            });
	
	$("#fest").on('click', '.delete' , function () {
				$(this).parent().remove();	
				if ($("#fest").contents().last().is("br")) {
					$("#fest").find('br').remove();
				}
				
				var w = $('#work_days').val().substring(0,2);
				var fw = parseInt(w) + 1;
				console.log(fw);
				$('#work_days').val(fw + ' days.');
				$('#mins_month').val($('#work_days').val().substring(0,2) * $('#mins_per_day').val().substring(0,3) + ' min.');
				$('html, body').animate({scroll: $(this).offset()}, 2000);
			});
</script>
@endsection


