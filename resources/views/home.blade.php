@extends('layouts.app')
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
@include('includes.topbar')
<section>
   <!-- Left Sidebar -->
        @include('includes.leftsidebar')
   <!-- #END# Left Sidebar -->
	
   <!-- Right Sidebar -->
        @include('includes.rightsidebar')
   <!-- #END# Right Sidebar -->
</section>
@if(Auth::user()->role_name == 'Admin')
<section class="content">
        <div class="container-fluid">
	
		<script>
			window.onload = function () {
				if($('#company-chart.active'))
				{
					var month = {!! json_encode($month) !!}; 
					var occurrences = { };
					for (var i = 0, j = month.length; i < j; i++) {
						occurrences[month[i]] = (occurrences[month[i]] || 0) + 1;
		
					var chart = new CanvasJS.Chart("company-chart", {
					data: [              
					{
						// Change type to "doughnut", "line", "splineArea", etc.
						type: "column",
						dataPoints: [
							{ label: 'Jan',  y: occurrences['01']  },
							{ label: 'Feb',  y: occurrences['02']  },
							{ label: 'March',  y: occurrences['03']  },
							{ label: 'April',  y: occurrences['04']  },
							{ label: 'May',  y: occurrences['05']  },
							{ label: 'June',  y: occurrences['06']  },
							{ label: 'July',  y: occurrences['07']  },
							{ label: 'Aug',  y: occurrences['08']  },
							{ label: 'Sept',  y: occurrences['09']  },
							{ label: 'Oct',  y: occurrences['10']  },
							{ label: 'Nov',  y: occurrences['11']  },
							{ label: 'Dec',  y: occurrences['12']  },
						]
					}
					]
				});
				}
				console.log(month);   
				console.log(occurrences);  
		
				chart.render();
			}
		
			if($('#employee-chart.active'))
			{	
				var emonth = {!! json_encode($emonth) !!}; 
				var occurrences = { };
				for (var i = 0, j = emonth.length; i < j; i++) {
					occurrences[emonth[i]] = (occurrences[emonth[i]] || 0) + 1;
		
				var chart = new CanvasJS.Chart("employee-chart", {
				data: [              
				{
					// Change type to "doughnut", "line", "splineArea", etc.
					type: "column",
					dataPoints: [
						{ label: 'Jan',  y: occurrences['01']  },
						{ label: 'Feb',  y: occurrences['02']  },
						{ label: 'March',  y: occurrences['03']  },
						{ label: 'April',  y: occurrences['04']  },
						{ label: 'May',  y: occurrences['05']  },
						{ label: 'June',  y: occurrences['06']  },
						{ label: 'July',  y: occurrences['07']  },
						{ label: 'Aug',  y: occurrences['08']  },
						{ label: 'Sept',  y: occurrences['09']  },
						{ label: 'Oct',  y: occurrences['10']  },
						{ label: 'Nov',  y: occurrences['11']  },
						{ label: 'Dec',  y: occurrences['12']  },
					]
					}
				],axisY:{
        		interval: 1,
				}	
      			});
			}
			console.log(emonth);   
			console.log(occurrences);  
			chart.render();
		}
			
		if($('#team-chart.active'))
		{	
			var tmonth = {!! json_encode($tmonth) !!}; 
			var occurrences = { };
			for (var i = 0, j = tmonth.length; i < j; i++) {
			occurrences[tmonth[i]] = (occurrences[tmonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("team-chart", {
			data: [              
			{
				// Change type to "doughnut", "line", "splineArea", etc.
				type: "column",
				dataPoints: [
					{ label: 'Jan',  y: occurrences['01']  },
					{ label: 'Feb',  y: occurrences['02']  },
					{ label: 'March',  y: occurrences['03']  },
					{ label: 'April',  y: occurrences['04']  },
					{ label: 'May',  y: occurrences['05']  },
					{ label: 'June',  y: occurrences['06']  },
					{ label: 'July',  y: occurrences['07']  },
					{ label: 'Aug',  y: occurrences['08']  },
					{ label: 'Sept',  y: occurrences['09']  },
					{ label: 'Oct',  y: occurrences['10']  },
					{ label: 'Nov',  y: occurrences['11']  },
					{ label: 'Dec',  y: occurrences['12']  },
				]
				}
				],axisY:{
				interval: 1,
      		}
      		});
		}
		console.log(tmonth);   
		console.log(occurrences);  
		chart.render();
	}
		
	}
	var selector = 'li';

		$(selector).on('click', function(){
			$(selector).removeClass('active');
			$(this).addClass('active');
		});
	  </script>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL USERS</div>
                            <div class="number">{{ $total_users }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL COMPANIES</div>
                            <div class="number">{{ $total_companies }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL TEAMS</div>
                            <div class="number">{{ $total_teams }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-black-tie"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL EMPLOYEES</div>
                            <div class="number">{{ $total_employees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<div class="card">
			<div class="body">
			<i class="fa fa-bar-chart"></i>	Report <br><br>
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
             	<li class="active"><a href="#company-chart" data-toggle="tab">Companies Report</a></li>
              	<li><a href="#employee-chart" data-toggle="tab">Employee Report</a></li>
              	<li><a href="#team-chart" data-toggle="tab">Team Report</a></li>
            </ul>
            <div class="tab-content">

              <div role="tabpanel" class="chart tab-pane active" id="company-chart" style="position: relative; height: 300px;">
			  </div>
              <div role="tabpanel"  class="chart tab-pane" id="team-chart" style="position: relative; height: 300px; ">
			  </div>
              <div role="tabpanel"  class="chart tab-pane" id="employee-chart" style="position: relative; height: 300px; "></div>
              
            </div>

   			</div>
   			</div>

        </div>
</section>
@elseif(Auth::user()->role_name == 'Company')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

	<script>
		  history.pushState(null, null, document.URL);
		  window.addEventListener('popstate', function () {
    	  history.pushState(null, null, document.URL);
		  });
	</script>
	
	<script>
		window.onload = function () {
			
		if($('#team-chart.active'))
		{	
		var tmonth = {!! json_encode($tmonth) !!}; 
			console.log(tmonth);   
		var occurrences = { };
		for (var i = 0, j = tmonth.length; i < j; i++) {
		occurrences[tmonth[i]] = (occurrences[tmonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("team-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		],axisY:{
        interval: 1,
      }
      });
	}
		console.log(tmonth);   
		console.log(occurrences);  
	chart.render();
		}
			
		if($('#employee-chart.active'))
		{	
		var emonth = {!! json_encode($emonth) !!}; 
		var occurrences = { };
		for (var i = 0, j = emonth.length; i < j; i++) {
		occurrences[emonth[i]] = (occurrences[emonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("employee-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		],axisY:{
        interval: 1,
      }
      });
	}
		console.log(emonth);   
		console.log(occurrences);  
	chart.render();
		}
			
		
	}
	var selector = 'li';

		$(selector).on('click', function(){
			$(selector).removeClass('active');
			$(this).addClass('active');
		});
	  </script>
            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL TEAMS</div>
                            <div class="number count-to">{{ $total_teams }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-black-tie"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL EMPLOYEES</div>
                            <div class="number count-to">{{ $total_employees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<div class="nav-tabs-custom">

            <ul class="nav nav-tabs pull-right">
              <li><a href="#employee-chart" data-toggle="tab">Employee Report</a></li>
              <li class="active"><a href="#team-chart" data-toggle="tab">Team Report</a></li>
				<li class="pull-left header"><i class="fa fa-bar-chart"></i>Report</li>
            </ul>
            <div class="tab-content no-padding">

              <div class="chart tab-pane active" id="team-chart" style="position: relative; height: 300px;">
			  </div>
              <div class="chart tab-pane" id="employee-chart" style="position: relative; height: 300px; width: 35%"></div>
              
            </div>

   			</div>

        </div>
</section>
@elseif(Auth::user()->role_name == 'Team')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
	<script>
		  history.pushState(null, null, document.URL);
		  window.addEventListener('popstate', function () {
    	  history.pushState(null, null, document.URL);
		  });
	</script>
	
	<script>
		window.onload = function () {
			
		if($('#team-chart.active'))
		{	
		var tmonth = {!! json_encode($month) !!}; 
			console.log(tmonth);   
		var occurrences = { };
		for (var i = 0, j = tmonth.length; i < j; i++) {
		occurrences[tmonth[i]] = (occurrences[tmonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("team-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		],axisY:{
        interval: 1,
      }
      });
	}
		console.log(tmonth);   
		console.log(occurrences);  
	chart.render();
		}
			
		if($('#employee-chart.active'))
		{	
		var emonth = {!! json_encode($emonth) !!}; 
		var occurrences = { };
		for (var i = 0, j = emonth.length; i < j; i++) {
		occurrences[emonth[i]] = (occurrences[emonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("employee-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		],axisY:{
        interval: 1,
      }
      });
	}
		console.log(emonth);   
		console.log(occurrences);  
	chart.render();
		}
			
		
	}
	var selector = 'li';

		$(selector).on('click', function(){
			$(selector).removeClass('active');
			$(this).addClass('active');
		});
	  </script>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-black-tie"></i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL EMPLOYEES</div>
                            <div class="number count-to">{{ $total_employees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<div class="nav-tabs-custom">

            <ul class="nav nav-tabs pull-right">
              <li><a href="#employee-chart" data-toggle="tab">Employee Report of your team</a></li>
              <li class="active"><a href="#team-chart" data-toggle="tab">Team Report of your company</a></li>
				<li class="pull-left header"><i class="fa fa-bar-chart"></i>Report</li>
            </ul>
            <div class="tab-content no-padding">

              <div class="chart tab-pane active" id="team-chart" style="position: relative; height: 300px;">
			  </div>
              <div class="chart tab-pane" id="employee-chart" style="position: relative; height: 300px; width: 35%"></div>
              
            </div>

   			</div>

        </div>
</section>
@elseif(Auth::user()->role_name == 'Employee')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
	<script>
		  history.pushState(null, null, document.URL);
		  window.addEventListener('popstate', function () {
    	  history.pushState(null, null, document.URL);
		  });
	</script>
	
	<script>
		window.onload = function () {
			
		if($('#company-chart.active'))
			{
		
		var month = {!! json_encode($month) !!}; 
		var occurrences = { };
		for (var i = 0, j = month.length; i < j; i++) {
			occurrences[month[i]] = (occurrences[month[i]] || 0) + 1;
		
		var chart = new CanvasJS.Chart("company-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		]
	});
	}
		console.log(month);   
		console.log(occurrences);  
		
	chart.render();
}
		
		if($('#employee-chart.active'))
		{	
		var emonth = {!! json_encode($emonth) !!}; 
		var occurrences = { };
		for (var i = 0, j = emonth.length; i < j; i++) {
		occurrences[emonth[i]] = (occurrences[emonth[i]] || 0) + 1;
		
			var chart = new CanvasJS.Chart("employee-chart", {
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: 'Jan',  y: occurrences['01']  },
				{ label: 'Feb',  y: occurrences['02']  },
				{ label: 'March',  y: occurrences['03']  },
				{ label: 'April',  y: occurrences['04']  },
				{ label: 'May',  y: occurrences['05']  },
				{ label: 'June',  y: occurrences['06']  },
				{ label: 'July',  y: occurrences['07']  },
				{ label: 'Aug',  y: occurrences['08']  },
				{ label: 'Sept',  y: occurrences['09']  },
				{ label: 'Oct',  y: occurrences['10']  },
				{ label: 'Nov',  y: occurrences['11']  },
				{ label: 'Dec',  y: occurrences['12']  },
			]
		}
		],axisY:{
        interval: 1,
      }
      });
	}
		console.log(emonth);   
		console.log(occurrences);  
	chart.render();
		}
		
}
	var selector = 'li';

		$(selector).on('click', function(){
			$(selector).removeClass('active');
			$(this).addClass('active');
		});
	  </script>
   
	<div class="row">
        <div class="col-xs-12">
          <div class="card" style="display: inline-block; margin-left: 50px;">
            <div class="header">
				<h3 class="box-title"><strong>Company Details of this employee:</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="body table-responsive">
              <table class="table table-hover">
				  @foreach($company as $comp)
				  	<tr><th>Company Name</th><td>{{$comp->comp_name}}</td></tr>
				  	<tr><th>Company URL</th><td>{{$comp->comp_url}}</td></tr>
				  	<tr><th>Company Address</th><td>{{$comp->address}}</td></tr>
				  	<tr><th>Company Phone</th><td>{{$comp->phone}}</td></tr>
				  	<tr><th>Company Username</th><td>{{$comp->username}}</td></tr>
				  	<tr><th>Company Email</th><td>{{$comp->email}}</td></tr>
				  	<tr><th>Company Created At</th><td>{{$comp->created_at}}</td></tr>
                  @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			<div class="card" style="float: right; margin-right: 50px">
            <div class="header">
				<h3 class="box-title"><strong>Team Details of this employee:</strong></h3>
            </div>
			<div class="body table-responsive">
              <table class="table table-hover">
				  @foreach($team as $t)
				  	<tr><th>Team Name</th><td>{{$t->team_name}}</td></tr>
				  	<tr><th>Company it belongs</th><td><strong>{{$t->comp_name}}</strong></td></tr>
				  	<tr><th>Team Address</th><td>{{$t->address}}</td></tr>
				  	<tr><th>Team Phone</th><td>{{$t->phone}}</td></tr>
				  	<tr><th>Team Username</th><td>{{$t->username}}</td></tr>
				  	<tr><th>Team Email</th><td>{{$comp->email}}</td></tr>
				  	<tr><th>Team Created At</th><td>{{$t->created_at}}</td></tr>
                  @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
			
			<div class="card">
			<div class="body">
			<i class="fa fa-bar-chart"></i>	Report <br><br>
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
             	<li class="active"><a href="#company-chart" data-toggle="tab">Team report of your company</a></li>
              	<li><a href="#employee-chart" data-toggle="tab">Employee Report of your team</a></li>
            </ul>
            <div class="tab-content">

              <div role="tabpanel" class="chart tab-pane active" id="company-chart" style="position: relative; height: 300px;">
			  </div>
              <div role="tabpanel"  class="chart tab-pane" id="employee-chart" style="position: relative; height: 300px; "></div>
              
            </div>

   			</div>
   			</div>

        </div>
</section>
@endif