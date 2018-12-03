@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">'
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
<section class="content">
<ol class="breadcrumb breadcrumb-col-blue pull-right">
        <li><a href="/home"><i class="material-icons">home</i> Home</a></li>
        <li class="active"><i class="material-icons">notifications</i> Notification Mails</li>
</ol>	
<!--
	 <div class="col-md-3">
      <div class="card">
            <div class="header bg-blue">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" data-toggle="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
		  
            <div class="body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ url('/showAllNotifications') }}"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">{{ $count }}</span></a></li>
                
              </ul>
            </div>
             /.box-body 
      </div>
      </div>
-->
		<script type="text/javascript">
				
		$(document).ready(function() {
			jQuery(document).ready(function($){
				$("#ckbCheckedAll").click(function () {
					var checkAll = this.checked;
					$('input[type=checkbox]').each(function() {
					this.checked = checkAll;
					//console.log(this.checked);
            	});   
    		});
	});
	});
	</script>
	
	<form method="POST" >
	<input type="hidden" name="_method" value="DELETE">
	{{ csrf_field() }}
		<div class="col-md-9">
			
          <div class="card">
            <div class="header bg-blue">
<!--			  <button type="button" class="btn btn-box-tool" data-widget="collapse" style="float: right"><i class="fa fa-minus"></i></button>-->
				<input type="checkbox" class="chk-col-black check" name= "ckbCheckedAll" id= "ckbCheckedAll" title="Select All Mails" style="display: inline-block; ">
				<label for="ckbCheckedAll" style="margin-top: 20px; margin-left: 10px"></label>
				<h3 class="box-title" style="float: right; margin-right: 680px">Inbox</h3>&nbsp;&nbsp;
            </div>
            <!-- /.box-header -->
            <div class="body">
             
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
				@for($i = 0; $i < count($ctime); $i++)
				 @if($ctime[$i] == $rtime[$i])
                  	<tr>
                    	<td><input type="checkbox" class="chk-col-blue check" name="check[]" id="ckbChecked{{ $i }}" value="{{ $msgs[$i]->id }}"><label for="ckbChecked{{ $i }}"></label></td>
                    	<td class="mailbox-name"><strong>{{ $msgs[$i]->name }}</strong></td>
                    	<td class="mailbox-subject"><strong><a href="{{ url('/singleNotification',[$msgs[$i]->id]) }}">{{ $msgs[$i]->message }}</a></strong></td>
                    	<td class="mailbox-date"><small>&nbsp;&nbsp; <strong>{{ $ctime[$i] }}</strong></small></td>
						<td class="mailbox-date"><small>&nbsp;&nbsp; <strong><a href="{{ url('/notifications',[$msgs[$i]->id]) }}" title="Mark as read"><i class="fa fa-envelope"></i></a></strong></small></td>
						<td class="mailbox-date"> 
<!--							<strong><a href="{{ url('/deleteNotification',[$msgs[$i]->id]) }}" title="Delete this mail" onClick="Do you want to delete this notification mail?"><i class="fa fa-trash-o"></i></a></strong></small>-->
							<form method="POST" >
								<input type="hidden" id="_token" value="{{ csrf_token() }}">
								{{ csrf_field() }}
								<strong><a class="button" title="Delete this mail" data-id="{{$msgs[$i]->id}}" style="cursor: pointer"><i class="fa fa-trash-o"></i></a></strong>
							</form>
					  	</td>
<!--						<td class="mailbox-date"><small>&nbsp;&nbsp; <strong>{{ $rtime[$i] }}</strong></small></td>-->
                  	</tr>
				   @else
					 <tr>
                  	  	<td><input type="checkbox" class="chk-col-blue check" name="check[]" id="ckbChecked{{ $i }}" value="{{ $msgs[$i]->id }}"><label for="ckbChecked{{ $i }}"></label></td>
                  		<td class="mailbox-name">{{ $msgs[$i]->name }}</td>
                   		<td class="mailbox-subject"><a href="{{ url('/singleNotification',[$msgs[$i]->id]) }}">{{ $msgs[$i]->message }}</a></td>
                   	 	<td class="mailbox-date"><small>&nbsp;&nbsp; {{ $ctime[$i] }}</small></td>
						<td class="mailbox-date"><small>&nbsp;&nbsp; <a href="{{ url('/unreadNotification',[$msgs[$i]->id]) }}" title="Mark as unread"><i class="fa fa-envelope-open"></i></a></small></td>
						<td class="mailbox-date">
							<form method="POST" >
								<input type="hidden" id="_token" value="{{ csrf_token() }}">
								{{ csrf_field() }}
								<a class="button" title="Delete this mail" data-id="{{$msgs[$i]->id}}" style="cursor: pointer"><i class="fa fa-trash-o"></i></a>
							</form>
						</td>
<!--						<td class="mailbox-date"><small>&nbsp;&nbsp; {{ $rtime[$i] }}</small></td>-->
                  	</tr>
				   @endif
				 @endfor
                  </tbody>
                </table>
				<script>
						$(document).on('click', '.button', function (e) {
							//e.preventDefault();
							var id = $(this).data('id');
							console.log(id);
							swal({
									title: "Are you sure you want to delete this notification mail?",
									text: "This notification mail will be deleted from your database permenantly!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {													
									$.post("{{url('/deleteNotification')}}", { _token : $('#_token').val(), id: id }).done(function(data) {
										location.reload();
										console.log(data);
//										swal("Deleted!", 'Employee has been deleted successfully.!', "success");
									}).fail(function(xhr, status, error) {
										console.log(xhr);
									})
								});
						});
				</script>	
              </div>

            </div>
				<br>
            <div class="body">
              <div class="mailbox-controls">
          
                <div class="btn-group">
				
<!--				  <button type="submit" class="btn btn-default btn-sm" name="delete" id = "delete"><i class="fa fa-trash-o" onClick="Do you want to delete all these notification mails?"></i></button>-->
					
				  <a class="btn btn-default btn-sm" name="delete" id = "delete" title="Delete these mails" style="cursor: pointer"><i class="fa fa-trash-o"></i></a>
                  
				  <a href="{{ url('/refreshNotification') }}" class="btn btn-default btn-sm" style="float: right;"><i class="fa fa-refresh"></i></a>
                </div>
                
<!--
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
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
        </div>
	</form>
			<script>
						$(document).on('click', '#delete', function (e) {
							//var nid = { 'ids[]' : []};
							var check = [];
							var nid = [];
							$(":checked").each(function() {
								if(!isNaN($(this).val()))
								{
									//nid['ids[]'].push($(this).val());
									nid.push($(this).val());
								}
							});
							console.log(nid);
							swal({
									title: "Are you sure you want to delete these notification mails?",
									text: "All these notification mails will be deleted from your database permenantly!",
									type: "warning",
									showCancelButton: true,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {													
									$.post("{{url('/deleteAllNotifications')}}", { _token : $('#_token').val(), check : nid }).done(function(data) {
										//location.reload();
										console.log(data);
//										swal("Deleted!", 'Employee has been deleted successfully.!', "success");
									}).fail(function(xhr, status, error) {
										console.log(xhr);
									})
								});
						});
				</script>
</section>