@extends ('layouts.myapp')
@section ('extendCSS')
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/custom/inbox.css')}}"/>
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
			<h3 class="page-title">My Inbox</h3>
			<!-- END PAGE HEADER-->
			<div class="clearfix">
			</div>
			<div class="modal fade" id="select_receiver_modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Select Receiver</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="portlet-input">
									<div class="input-icon right">
										<i class="icon-magnifier"></i>
										<input  type="text" class="form-control input-circle" id="search_value" placeholder="search...">
									</div>
								</div>	
								<div class="search_result">
									<label style="text-decoration: underline;">Search Result</label>
									<ul class="active_receivers" id="active_receivers">
									</ul>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<input type="text" id="sender_id" value="{{Auth::user()->id}}" name="">
						<input type="text" id="receiver_id" name="">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bubble font-red-sunglo"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Chats</span>
								<span class="caption-subject font-red-sunglo bold" id="selected_receiver"></span>
							</div>
							<div class="actions">
								<div class="portlet-input input-inline">
									<div class="select_receiver_btn" data-target="#select_receiver_modal" data-toggle="modal" onclick="getSearchAsync()">Select Receiver</div>
								</div>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div class="scroller" style="height: 550px;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats" id="chat-plane">
								</ul>
							</div>
							<div class="chat-form">
								<div class="input-cont">
									<input class="form-control" type="text" id="typing_message" placeholder="Type a message here..."/>
								</div>
								<div class="btn-cont">
									<span class="arrow">
									</span>
									<div class="btn blue icn-only" id="send_message_btn">
									<i class="fa fa-check icon-white"></i>
									</div>
								</div>								
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-3">
					<div class="recent-message">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
@endsection
@section ('extendJS')
	<script type="text/javascript">
		var allSysUser1;
		var sender_id = $("#sender_id").val();
		var receiver_id;
		function getSearchAsync() {
			var allSysUser;
			var searchvalue = '';
			var searchvalue_old = '';
			$("#search_value").val('');
			$.ajax({
                type:'post',
                url:"{{url('/profiles/getSysUser')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                },
                success:function(data){	 
                	allSysUser = data;
                	allSysUser1 = data;
                }
            });
			setInterval(function(){ 		
 				searchvalue = $("#search_value").val();

	            if (searchvalue != searchvalue_old) {
	            	$("#active_receivers").html("");
		            var active_receivers = "";
	            	for (var i = allSysUser.length - 1; i >= 0; i--) {
	            		if (allSysUser[i]['name'].toLowerCase() == searchvalue.toLowerCase() && searchvalue != '' && allSysUser[i]['id'] != sender_id) {
			            	active_receivers += '<li onclick="appendreceiver(' + allSysUser[i]['id']  +')">' + allSysUser[i]['name'] + '</li>';
			        	}
	            	}
		            $("#active_receivers").append(active_receivers);
	            }
	            searchvalue_old = searchvalue;
			}, 500);			
		}

		function appendreceiver($id) {                                                   

			$("#select_receiver_modal").modal('hide');
			$("#selected_receiver").html('');
			for (var i = allSysUser1.length - 1; i >= 0; i--) {
				if(allSysUser1[i]['id'] == $id)
				{
					$("#selected_receiver").append('with  <h2 style="color:blue;">' + allSysUser1[i]['name'] + '</h2>');
					$("#receiver_id").val(allSysUser1[i]['id']);
				}
			}			
			receiver_id = $id;			
	        $("#chat-plane").html('');
	        $.ajax({
                type:'post',
                url:"{{url('/profiles/getChatData')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    receiver_id : receiver_id,
                    sender_id : sender_id
                },
                success:function(data){
                    for (var i = 0; i <= data.length - 1; i++) {
                    	if (data[i]['sender_id'] == sender_id) {
                    		$("#chat-plane").append('<li class="out"><img class="avatar" alt="" src="{{url("upload/photo/".Auth::user()->photo )}}"/><div class="message"><span class="arrow"></span><span class="body msg_content_style">' + data[i]["msg_content"] + '</span><span class="datetime">at ' + data[i]["send_time"] + ' </span></div></li>');
                    	}
                    	else{
                    		$("#chat-plane").append('<li class="in"><img class="avatar" alt="" src="{{url("upload/photo/".Auth::user()->photo )}}"/><div class="message"><span class="arrow"></span><span class="body msg_content_style">' + data[i]["msg_content"] + '</span><span class="datetime">at ' + data[i]["send_time"] + ' </span></div></li>');
                    	}
                    }
                }
            });
		}


        function formatDate(date) 
        {
        	return date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
        }

		$(document).ready(function() {
			setInterval(function(){ 
				var sender_id = $("#sender_id").val();
				$.ajax({
	                type:'post',
	                url:"{{url('/profiles/getNewMessage')}}",
	                data:{
	                    _token:'<?php echo csrf_token() ?>',
	                    sender_id : sender_id,
	                },
	                success:function(data){
	                    console.log(data);
	                }
	            });
			}, 500);	



			$("#chat-plane").append('<h1>Select user who you are going to chat.</h1>');
			$("#send_message_btn").on('click', function() {

				var msg_content  = $("#typing_message").val();				
				var send_time = new Date();
				send_time = formatDate(send_time);
				

				$.ajax({
	                type:'post',
	                url:"{{url('/profiles/postMessage')}}",
	                data:{
	                    _token:'<?php echo csrf_token() ?>',
	                    sender_id : sender_id,
	                    receiver_id : receiver_id,
	                    send_time : send_time,
	                    msg_content : msg_content
	                },
	                success:function(data){                	
	                    
	                    $("#typing_message").val('');	
	                    if (data['msg_content'] == null) {data['msg_content'] = '';}
	                    $("#chat-plane").append('<li class="out"><img class="avatar" alt="" src="{{url("upload/photo/".Auth::user()->photo )}}"/><div class="message"><span class="arrow"></span><span class="body msg_content_style">' + data["msg_content"] + '</span><span class="datetime">at ' + data["send_time"] + ' </span></div></li>');

	                }
	            });
			});
		});


	</script>
@endsection