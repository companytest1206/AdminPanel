@extends('layouts.app')
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
	<div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
							 <h2><strong>Upload your CV here:</strong></h2>
	
						<!--
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ url('/companies') }}">Add New Company</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
-->

                        </div>
                        <div class="body">
                            <form method="post" action="{{url('/uploadCV', [Auth::user()->id])}}" enctype="multipart/form-data">
  							@csrf
					  
                                <label for="name">Employee's Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $errors->has('name') ? '' : Auth::user()->name }}" placeholder="Full name">
									 @if ($errors->has('name'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('name') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>

								<label for="email">Employee's Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                       <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $errors->has('email') ? '' : Auth::user()->email }}">
                                    </div>
									 @if ($errors->has('email'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('email') }}
     			 					</span>
     			 					@endif
                                </div>
									
								<label for="document">Employee's Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <small style="display: inline-block">Only pdf file are allowed!</small>
        								<input type="file" name="document" id="document" {{ $errors->has('document') ? ' is-invalid' : '' }}>
                                    </div>
									 @if ($errors->has('document'))
    								<span class="invalid-feedback" role="alert" style="color: red;">
      				  					{{ $errors->first('document') }}
     			 					</span>
     			 					@endif
                                </div>
								<br>
									
								<script>
									$('input[type=file]').on('change', function(){
										var img=$(this).val();
						
										console.log(img);
									})
								</script>

                                <div class="row">
								<input type="submit" class="btn btn-primary" value="Add" style="width: 80px; margin-left: 20px;">
								<a class="btn btn-primary btn-close" href="{{ url('/home') }}" style="width: 80px; margin-left: 5px;">Cancel</a>
       					</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>