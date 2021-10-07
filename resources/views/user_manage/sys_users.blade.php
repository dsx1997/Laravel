@extends ('layouts.myapp')
@section ('extendCSS')
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
<style type="text/css">
	.logged {
		margin: 8px 0px 0px 13px;
	}
	.logged-img {
		width: 20px;
		height: 20px;
	}
	.status_btn:hover {
		color: red;
		cursor: pointer;
	}
	.modal-body {
		margin-left: 20px;
	}
</style>
@endsection
@section ('content')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="modal-qwerqwer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				</div>
			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="status_setting_modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">User Status</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" method="POST" id="user_status_change_form" action="{{route('user_status_change')}}">
								{{ csrf_field()}}
							
								<input type="hidden" name="user_statu_id" id="user_status_id">

								<div class="form-group">
									<label>User Status Select</label>
									<select class="form-control input-xlarge" name="user_status_value" id="user_status_value">
										<option value="allow">allow</option>
										<option value="apply">apply</option>
										<option value="stop">stop</option>
									</select>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue" id="user_status_change_btn">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Users who joined our System.
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Editable Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th style="width: 50px;">
									 ID
								</th>
								<th style="text-align: center;">
									 Name
								</th>
								<th style="width: 60px;">
									Image
								</th>
								<th style="text-align: center;">
									 Email
								</th>
								<th style="width: 50px;">
									 Logged
								</th>
								<th>
									 Created at
								</th>
								<th>
									 Latest visit
								</th>
								<th>
									 Status
								</th>
								<th>
									 Reset Password
								</th>
								<th>
									 Delete Account
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($data as $key)							
								<tr>
									<td>
										{{$key->id}}
									</td>
									<td style="text-align: center;">
										{{$key->name}}
									</td>
									<td>
										
											<img src='{{url("upload/photo/{$key->photo}")}}'  class="img-circle" alt="" style="width: 45px; height: 45px;">
										
									</td>
									<td style="text-align: center;">
										{{$key->email}}
									</td>									
									<td>
										@if ($key->logged == true)
											<div class="logged logged-in">
												<img class="logged-img" src="{{asset('assets/admin/pages/img/logged-in.png')}}">
											</div>
										@else
											<div class="logged logged-out">
												<img class="logged-img" src="{{asset('assets/admin/pages/img/logged-out.png')}}">
											</div>
										@endif										
									</td>
									<td>
										{{date(' Y F d ', strtotime($key->created_at))}} 
									</td>
									<td>
										{{date(' Y F d ', strtotime($key->updated_at))}}
									</td>
									<td>
										<div data-target="#status_setting_modal" data-toggle="modal" class="status_btn" onclick="user_status({{$key->email}})">{{$key->status}}</div>
									</td>
									<td>
										<a class="reset">Reset Password</a>
									</td>
									<td>
										<a class="delete">Delete Account</a>
									</td>
								</tr>							
							@endforeach
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
@endsection
@section('extendJS')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
		function user_status($id)
		{
			$("#user_status_id").val($id);
		}
	$(document).ready(function(){
		$("#user_status_change_btn").on('click', function() {
			$("#user_status_change_form").submit();
		});
	});
</script>
@endsection