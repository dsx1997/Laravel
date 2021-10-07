@extends ('layouts.myapp')
@section ('extendCSS')
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/custom/bids.css')}}"/>
@endsection
@section ('content')

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="my_modal" id="new_bid_modal">
			<div class="my_modal_header">
				<h1>Add New Bid</h1>
			</div>
			<div class="my_modal_body">
				<div class="form-group">
					<label class="control-label">Bid name</label>
					<input type="text" id="new_bid_name" name="new_bid_name" class="form-control">

					<label class="control-label">Content</label>
					<textarea class="form-control" rows="10" cols="100" id="new_content" name="new_content" style="font-family: sans-serif;letter-spacing: 1.4px;"></textarea>
				</div>	
				<div class="form-group">
					<input type="button" id="new_bid_ok_btn" value="Save" class="btn green-haze">
					<input type="button" id="new_bid_cancel_btn" value="Cancel" class="btn default">
				</div>
			</div>
		</div>
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">My Bids </h3>
			<input class="custom_btn" type="button" id="new_bid_btn" name="new_bid_btn" value="New Bid">
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">						
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						@foreach($data as $key)
							<div class="col-md-4">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold">
												<label class="control-label" >name:  </label>
												<input class="project_name_input" type="text" id="edit_bid_name" name="edit_bid_name" value="{{$key->bid_name}}" placeholder="Enter Bid name"><br>
													
											</span>
										</div>	
										<a href="{{action('Profiles\BidManageController@delete_bid',$key->id)}}" class="assign_role" >
											<svg height="15" width="15">
												  <line x1="0" y1="0" x2="15" y2="15" />
												  <line x1="15" y1="0" x2="0" y2="15" />
											</svg>	
										</a>							
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<div class="form-group">
												<textarea class="form-control" rows="10" id="edit_content" name="edit_content">{{$key->content}}</textarea><br>
												<small style="color:blue;">last updated time:    </small>{{$key->record_time}}	
												<input type="hidden"value="{{$key->id}}">
												<input type="hidden"value="{{$key->bid_name}}">
												<input type="button" id="{{$key->id}}" value="Save Changes" class="btn btn-primary save_button" style="float:right;">
											</div>											
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->

						<form role="form" action="{{url('/profiles/bid_edit')}}" id="bid_index" style="display:none;">
							{{csrf_token()}}
						</form>
@endsection
@section ('extendJS')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/pages/scripts/profile.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/myscripts/my_account.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {		
		$("#new_bid_btn").on('click', function(){
			document.getElementById('new_bid_modal').style.display = 'flex';
			// document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		});

		$("#new_bid_cancel_btn").on('click', function(){
			document.getElementById('new_bid_modal').style.display = 'none';
		});
		$("#new_bid_ok_btn").on('click', function(){
			var new_bid_name = $("#new_bid_name").val();
			var new_content = $("#new_content").val();
			$.ajax({
                type:'post',
                url:"{{url('/profiles/add_new_bid')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    new_bid_name : new_bid_name,
                    new_content : new_content, 
                },
                success:function(data){
                	$("#new_bid_modal").modal('hide');
                    $("#bid_index").submit();
                }
            });
		});
		$('body').on('click', '.save_button', function(){
			
			var $input = $( this );
            var nRow = $(this).parents('div')[0];
            var jqInputs = $('>input', nRow);
            var jqTextareas = $('>textarea', nRow);
			var bid_id = jqInputs[0].value;
			var bid_name = jqInputs[1].value;
			var content = jqTextareas[0].value;
			$.ajax({
                type:'post',
                url:"{{url('/profiles/update_bid')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    bid_id : bid_id,
                    bid_name : bid_name, 
                    content : content,
                },
                success:function(data){
                	toastr.options = {
				        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
				        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
				        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
					if (data == 'success')
					{
						var title = 'Success!';
				        var msg = 'Your Bid have changed';
				        toastr['success'](msg, title); 
					}
					else
					{
						var title = 'Error!';
				        var msg = 'Some issue have occured';
				        toastr['error'](msg, title);
					}
                }
            });
		})
	});
</script>
@endsection