@extends('layouts.app')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
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
							 <h2><strong>Company Details this team belongs:</strong></h2>
	
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
                            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
				  @foreach($company_details as $comp)
				  	<tr><th>Company Name</th><td>{{$comp->comp_name}}</td></tr>
				  	<tr><th>Company URL</th><td>{{$comp->comp_url}}</td></tr>
				  	<tr><th>Company Username</th><td>{{$comp->username}}</td></tr>
				  	<tr><th>Company Email</th><td>{{$comp->email}}</td></tr>
				  	<tr><th>Company Created At</th><td>{{$comp->created_at}}</td></tr>
                  @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
			<h5 style="float: left; margin-left: 350px; color: red"><strong>Note:- You can change your company from here if you want.</strong></h5>
			<form action="/change/company" method="post">
			@csrf
			<div class="form-group has-feedback" style="margin-left: 350px; margin-top: 10px; display: inline-block; width: 250px;">
					
        			<select class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" id="company_name">
						@foreach($companies as $comp)
						{	
							<option value="{{$comp->cid}}" @if ($comp->cid == Auth::user()->company_id)
        					selected="selected"
    						@endif>{{$comp->comp_name}}</option>
						}
						@endforeach
				</select>
			</div>
			<input type="submit" class="btn btn-primary" value="Update" style=" margin-left: 20px">
			</form>
                        </div>
                    </div>
                </div>
        
</section>