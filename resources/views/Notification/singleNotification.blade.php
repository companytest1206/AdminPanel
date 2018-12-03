@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('js/pages/forms/editors.js') }}"></script>
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
        <li><a href="/showAllNotifications"><i class="material-icons">notifications</i> Notification Mails</a></li>
        <li class="active"><i class="material-icons">mail</i> Notification Mail</li>
</ol>
<section class="content">

		<div class="col-md-10">
          <div class="card">
            <div class="header bg-blue">
              <h3 class="box-title">Read Mail</h3>
				<span class="mailbox-read-time pull-right">@php 
							$mydate = $msg->created_at;
							echo date("M j, Y, h:i", strtotime("$mydate"));
					  @endphp ({{ $timeDiff }})</span>
            </div>
            <!-- /.box-header -->
            <div class="body">
              <center><div class="mailbox-read-info">
                <h3><strong>Laravel: You've got a new message from {{ $msg->name }}!</strong></h3>
                <h5>From: {{ $msg->email  }}
                  </h5>
              </div></center>
              <!-- /.mailbox-read-info -->

              <!-- /.mailbox-controls -->
              <center><div class="mailbox-read-message">
                <h3><strong>Hello {{ Auth::user()->name }}!</strong></h3>

                <p>CV has been sended in email.</p>

                <p>Thank you! <br>
					Yours Faithfully {{ $msg->name }}!</p>
              </div></center>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">
             
				 <form action="{{ url('/deleteNotification', [$msg->id]) }}" method="POST" style="float: left; margin-left: 150px;">
					<input type="hidden" name="_method" value="DELETE">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure you want to delete this notification mail?');"><i class="fa fa-trash-o"></i>&nbsp;Delete this mail</button>
				</form>
				
				<a href="{{ url('/unreadNotification', [$msg->id]) }}" class="btn bg-cyan" style="display: inline-block; margin-left: 20px;"><i class="fa fa-eye-slash"></i>&nbsp;Mark As Unread</a>
			
<!--				<a href="" class="btn btn-default" style="display: inline-block; margin-left: 30px" id="reply"><i class="fa fa-reply"></i>&nbsp;Reply back</a>-->
				<button type="button" class="btn bg-blue-grey" id="reply" style="display: inline-block; margin-left: 20px"><i class="fa fa-reply"></i>&nbsp;&nbsp;Reply back</button></button>	
			  
			    <button type="button" class="btn bg-blue-grey" id="forward" style="display: inline-block; margin-left: 20px"><i class="fa fa-share"></i>&nbsp;Forward Mail</button></button>
	
			</div>
			<br>  
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
			
        </div>
		
		<script>
		$(document).ready(function() {
			jQuery(function ($) {
				//Add text editor
				$("#tinymce").wysihtml5();
				console.log('hey');
			});
  		});
			
		$(document).ready(function() {
			jQuery(function ($) {
				//Add text editor
				$("#forward-textarea").wysihtml5();
			});
  		});
		
		$('#reply').click(function() {
			$('#replybox').css('display','block');
		});
			
		$('#close').click(function() {
			console.log('hey');
			$('#replybox').css('display','none');
		});
		
		$(document).ready(function() {
			$('#discard').on('click', function(){
				$('#replybox').css('display','none');
			})
		});
			
		$(document).ready(function() {
			$('#close').on('click', function(){
				$('#replybox').css('display','none');
			})
		});
			
		$(document).ready(function() {
			$('#close1').on('click', function(){
				$('#forwardbox').css('display','none');
			})
		});
			
		$('#forward').click(function() {
			$('#forwardbox').css('display','block');
		});
			
		$(document).ready(function() {
			$('#forward_discard').on('click', function(){
				$('#forwardbox').css('display','none');
			})
		});
			
		$(document).ready(function() {
			$('#details').val($('#data').text());
		});
			
		</script>
		
		<div class="col-lg-12" style="display: none;" id="replybox">
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
						<i class="material-icons" id="close" style="float: right; cursor: pointer">close</i>
                        <h5 class="box-title" id="title_email"><i class="fa fa-reply"></i>&nbsp;
				 				{{ $msg->email }}</h5>
                        </div>
						<form action="{{url('/replyEmailNotification/flag=reply', [$msg->id])}}" method="POST" id="reply_form" enctype="multipart/form-data">
						@csrf
						<input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <div class="body">
							<div class="form-group">
				 				<input type="hidden" name="to_mail" id="to_mail" value="{{ $msg->email }}">
				 				<input type="hidden" name="from_mail" value="{{ Auth::user()->email }}">
				 				<input type="hidden" name="from_name" value="{{ Auth::user()->name }}">
				 				<input type="hidden" name="to_name" id="to_name" value="{{ $msg->name }}">
								<div class="form-line">
                					<textarea id="tinymce" class="form-control" style="height: 100px" name="reply">
				 						
									</textarea>
								</div>
              				</div>
              			<div class="form-group">
							<i class="fa fa-paperclip"></i> Attachment
                			<div class="btn bg-blue-grey">
                  				<input type="file" name="attachment" id="attachment">
                			</div>
                			<p class="help-block">Max. 32MB</p>
              			</div>
                        </div>	
            
            			<div class="box-footer">
              				<div class="pull-right">
               	 				<button type="button" class="btn bg-blue-grey" id="draft" style="margin-right: 20px"><i class="fa fa-envelope-open"></i>&nbsp;&nbsp;Save as Draft</button></button>
                				<button type="submit" class="btn bg-blue-grey" style="margin-right: 20px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Send</button>
			  				</div>
							<button type="button" class="btn bg-blue-grey" id="discard" style="margin-left: 20px"><i class="fa fa-trash"></i>&nbsp;&nbsp;Discard</button></button>	
            			</div><br>
		  			</form>
				</div>
				<script>

				$('button#draft').on('click', function (e) {
          		//e.preventDefault();
				var url = $('#reply_form').attr('action');
				var flag = 'draft';
				var split = url.split("/");
				var newurl = split[0]+'/'+split[1]+'/'+split[2]+'/'+split[3]+'/'+'flag='+flag+'/'+split[5];
				var msg = tinymce.get("tinymce").getContent();
				//console.log(msg);
					$.post(newurl, {  _token : $('#_token').val(), msg_id: $('#msg_id').val(), forward_to: $('#to_mail').val(), details: 'null', forward_msg: msg, f_attachment: $('#attachment').val() }).done(function(data) {
						console.log(data);
						$("#flash").html('Message saved as draft successfully!'); 
              			$("#flash").addClass("alert alert-success offset4 span4");
					}).fail(function(xhr, status, error) {
						console.log(xhr);
					})
				})
				
			</script>
          	</div>
          </div>
      
		</div>

		<div class="col-md-12" style=" display: none;" id="forwardbox">
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<form action="{{url('/forwardThisMail/flag=forward', [$msg->id])}}" method="POST" id="forward_form" enctype="multipart/form-data"><br>
					@csrf
                    <div class="card">
                        <div class="header bg-blue-grey">
                           <h5 class="box-title" style="display: inline-block"><i class="fa fa-mail-forward" ></i>&nbsp; To: </h5>
								<i class="material-icons" id="close1" style="float: right; cursor: pointer">close</i>
                                <div class="form-group" style="width: 200px; float: right; margin-right: 820px;">
                                    <div class="form-line" >
                                        <input type="email" class="form-control" id="forward_to" name="forward_to" placeholder="Email" value="{{ $errors->has('forward_to') ? '' : old('forward_to') }}">
                                    </div>
									 @if ($errors->has('forward_to'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('forward_to') }}
     			 					</span>
     			 					@endif
                                </div>
						</div>
						
							<input type="hidden" id="_token" value="{{ csrf_token() }}">
							<input type="hidden" id="msg_id" value="{{ $msg->id }}">
							
						<div style="margin-left: 20px;" id="data">
			  				<h5>--------Forwarded Message--------</h5>
							<h5>From: <strong>{{ Auth::user()->name }}</strong> {{'<'.Auth::user()->email.'>'}}</h5>
							<h5>Date: @php $mydate = $msg->created_at;
								echo date("M j, Y, h:i", strtotime("$mydate"));
					  			@endphp ({{ $timeDiff }})</h5>
							<h5>Subject: Laravel: You've got a new message from {{ Auth::user()->name }}!</h5>
							<h5>To: {{ '<'.$msg->email.'>' }}</h5>
						</div>
						
						<textarea id="details" class="form-control" style="height: 150px; width: 500px; display: none;" name="details"></textarea>
						<br>
								
                        <div class="body">
						<div class="form-group">
                			<textarea id="ftinymce" class="form-control" style="height: 200px" name="textarea">
				 
              	  				<center><h3><strong>Hello {{ Auth::user()->name }}!</strong></h3>
              	  				<p>CV has been sended in email.</p>
               					<p>Thank you! <br> Yours Faithfully, {{ $msg->name }}!</p></center>
              
							</textarea>
              			</div>
				
              			<div class="form-group">
							<i class="fa fa-paperclip"></i> Attachment
                			<div class="btn btn-default btn-file">
                  				<input type="file" name="f_attachment" id="f_attachment">
                			</div>
                			<p class="help-block">Max. 32MB</p>
              			</div>
                        </div>	
						
            
            		<div class="box-footer">
           		  		<div class="pull-right">
							<button type="button" class="btn bg-blue-grey" id="fdraft" style="margin-right: 20px"><i class="fa fa-envelope-open"></i>&nbsp;&nbsp;Save as Draft</button></button>
                			<a href="{{ url('/saveAsDraft',[$msg->id]) }}" class="btn btn-default"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Save as Draft</a>
                			<button type="submit" class="btn bg-blue-grey" style="margin-right: 20px"><i class="fa fa-envelope-o" id="send"></i>&nbsp;&nbsp;Send</button>
			  			</div>
						<button type="button" class="btn bg-blue-grey" id="forward_discard" style="margin-left: 20px"><i class="fa fa-trash"></i>&nbsp;&nbsp;Discard</button></button>	
            		</div>
					<br>
										
					</div>
					</form>
					<script>
						$('#forward_to').change(function() {
							console.log($(this).val());
						});
						
							$('button#fdraft').on('click', function (e) {
								//e.preventDefault();
								var url = $('#forward_form').attr('action');
								var flag = 'draft';
								var split = url.split("/");
								var newurl = split[0]+'/'+split[1]+'/'+split[2]+'/'+split[3]+'/'+'flag='+flag+'/'+split[5];
								var msg = tinymce.get("tinymce").getContent();

								$.post(newurl, {  _token : $('#_token').val(), msg_id: $('#msg_id').val(), forward_to: $('#forward_to').val(), details: $('textarea:input[name=details]').val(), forward_msg: msg, f_attachment: $('#f_attachment').val() }).done(function(data) {
									console.log(data);
									$("#flash").html('Message saved as draft successfully!'); 
									$("#flash").addClass("alert alert-success offset4 span4");
								}).fail(function(xhr, status, error) {
									console.log(xhr);
								})
						})
				
					</script>
							
		  		</form>
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