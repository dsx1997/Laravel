@extends ('layouts.myapp')
@section ('extendCSS')
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
@endsection
@section ('content')

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			User Account <small>user account page sample</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pages</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">User Account</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="{{url('upload/photo/'.Auth::user()->photo)}}" class="img-responsive" alt="">

							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 {{Auth::user()->name}}
								</div>
								<div class="profile-usertitle-job">
									 Developer
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
								<button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
									<li>
										<a href="extra_profile.html">
										<i class="icon-home"></i>
										Overview </a>
									</li>
									<li class="active">
										<a href="extra_profile_account.html">
										<i class="icon-settings"></i>
										Account Settings </a>
									</li>
									<li>
										<a href="page_todo.html" target="_blank">
										<i class="icon-check"></i>
										{{$ip_address}}</a>
									</li>
									<li>
										<a href="extra_profile_help.html">
										<i class="icon-info"></i>
										Help </a>
									</li>
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 37
									</div>
									<div class="uppercase profile-stat-text">
										 Projects
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 51
									</div>
									<div class="uppercase profile-stat-text">
										 Tasks
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 61
									</div>
									<div class="uppercase profile-stat-text">
										 Uploads
									</div>
								</div>
							</div>
							<!-- END STAT -->
							<div>
								<h4 class="profile-desc-title">About Marcus Doe</h4>
								<span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-globe"></i>
									<a href="http://www.keenthemes.com">www.keenthemes.com</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-twitter"></i>
									<a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-facebook"></i>
									<a href="http://www.facebook.com/keenthemes/">keenthemes</a>
								</div>
							</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">Change Password</a>
											</li>
											<li>
												<a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" action="{{url('personal_info')}}">
													{{ csrf_field() }}
													<div class="form-group">
														<label class="control-label">Name</label>
														<input type="text" value="{{$data->name}}" id="name" name="name" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<input type="text" value="{{$data->Mobile_Number}}" id="Mobile_Number" name="Mobile_Number" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Interests</label>
														<input type="text" value="{{$data->Interests}}" id="Interests" name="Interests" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Occupation</label>
														<input type="text" value="{{$data->Occupation}}" id="Occupation" name="Occupation" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">About</label>
														<textarea class="form-control" rows="3" id="About" name="About">{{$data->About}}</textarea>
													</div>
													<div class="form-group">
														<label class="control-label">Website Url</label>
														<input type="text" value="{{$data->Website_Url}}" id="Website_Url" name="Website_Url" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<input type="button" id="personal_info_ok_btn" value="Save Changes" class="btn green-haze">
														<input type="button" id="personal_info_cancel_btn" value="Cancel" class="btn default">
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_2">
												<p>
													 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
												</p>
												<form id="photo_upload_form" action="{{route('photo_upload')}}" method="post" enctype="multipart/form-data" role="form">
													{{ csrf_field() }}
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																	<span class="fileinput-new">
																	Select image </span>
																	<span class="fileinput-exists">
																	Change </span>
																	<input type="file" name="image"> 
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">NOTE! </span>
															<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
														</div>
													</div>
													<div class="margin-top-10">
														<a href="javascript:;" class="btn green-haze" id="image_change_ok_btn">
														Submit </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form action="#">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" class="form-control" id="oldpassword" name="oldpassword" />
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control" id="newpassword" name="newpassword" />
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control" id="repassword" name="repassword" />
													</div>
													<div class="margin-top-10">
														<input type="button" id="password_set_ok_btn" value="Save Changes" class="btn green-haze">
														<input type="button" id="password_set_cancel_btn" value="Cancel" class="btn default">
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_4">
												<form action="#">
													<table class="table table-light table-hover">
													<tr>
														<td>
															 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
														</td>
														<td>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option1"/>
															Yes </label>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option2" checked/>
															No </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<a href="javascript:;" class="btn green-haze">
														Save Changes </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END PRIVACY SETTINGS TAB -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
@endsection
@section ('extendJS')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/pages/scripts/profile.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/myscripts/my_account.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {		
		$("#personal_info_ok_btn").on('click', function(){
			var name = $("#name").val();
			var Mobile_Number = $("#Mobile_Number").val();
			var Interests = $("#Interests").val();
			var Occupation = $("#Occupation").val();
			var About = $("#About").val();
			var Website_Url = $("#Website_Url").val();
			$.ajax({
				type:'post',
				url:"{{url('/profiles/update_personal_info')}}",
				data:{
					_token:'<?php echo csrf_token()?>',
					name : name,
					Mobile_Number : Mobile_Number,
					Interests : Interests,
					Occupation : Occupation,
					About : About,
					Website_Url : Website_Url,
				},
				success: function(data){
					console.log(data);
				}
			});
		});
		$("#password_set_ok_btn").on('click', function(){
			var oldpassword = $("#oldpassword").val();
			var newpassword = $("#newpassword").val();
			var repassword = $("#repassword").val();
			$.ajax({
				type:'post',
				url:"{{url('/profiles/check_change_password')}}",
				data:{
					_token:'<?php echo csrf_token() ?>',
					oldpassword : oldpassword,
					newpassword : newpassword,
					repassword : repassword,
				},
				success:function(data){					
				    toastr.options = {
				        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
				        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
				        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
					if (data == 'wrong_oldpassword')
					{
						var title = 'Error!';
				        var msg = 'Your Current Password is wrong.';
				        toastr['error'](msg, title); // Wire up an event handler to a button in the toast, if it exists
					}
					else if(data == 'unmatched_password')
					{
						var title = 'Error!';
				        var msg = 'Your New Password is not matched.';
				        toastr['error'](msg, title); // Wire up an event handler to a button in the toast, if it exists
					}
					else if(data == 'change_success')
					{
						var title = 'Success!';
				        var msg = 'Your Password is just changed.';
				        toastr['success'](msg, title); // Wire up an event handler to a button in the toast, if it exists	
					}
							 
				}
			});
		});
		$("#image_change_ok_btn").on('click' , function(){
			$("#photo_upload_form").submit();
		});
	});
</script>
@endsection