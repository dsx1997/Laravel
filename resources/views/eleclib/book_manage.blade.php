@extends ('layouts.myapp')
@section ('extendCSS')
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
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
			Book Manage
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
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											Add New Book<i class="fa fa-plus"></i>
											</button>
										</div>
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
								<th>
									 Title
								</th>
								<th>
									 Publisher
								</th>
								<th>
									 Publish year
								</th>
								<th>
									 Page
								</th>
								<th>
									 Read count
								</th>
								<th>
									 Download count
								</th>
								<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($data as $key)							
								<tr>
									<td>
										{{$key->title}}
									</td>
									<td>
										{{$key->publisher}}
									</td>
									<td>
										{{$key->public_year}}
									</td>
									<td>
										{{$key->page}}
									</td>
									<td>
										{{$key->read_cnt}}
									</td>
									<td>
										{{$key->download_cnt}}
									</td>
									<td>
										<a class="edit">Edit</a>
									</td>
									<td>
										<a class="delete">Delete</a>
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

	$(document).ready(function(){

		var update_save = '';

		function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function createRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[5] + '">';
            jqTds[6].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[7].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }
        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[5] + '">';
            jqTds[6].innerHTML = '<a class="edit" href="">Update</a>';
            jqTds[7].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 6, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 7, false);
            oTable.fnDraw();

            var title =    jqInputs[0].value;
            var publisher =   jqInputs[1].value;
            var public_year = jqInputs[2].value;
            var page =        jqInputs[3].value;
            var read_cnt =    jqInputs[4].value;
            var download_cnt =jqInputs[5].value;          
            
            $.ajax({
				type:'post',
				url:"{{url('/library_manage/book_register')}}",
				data:{
					_token:'<?php echo csrf_token() ?>',
					title : title,
					public_year : public_year,
					publisher : publisher,
					page : page,
					read_cnt : read_cnt,
					download_cnt : download_cnt,					
				},
				success:function(data){
					toastr.options = {
				        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
				        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
				        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
					
						var title = 'Success!';
				        var msg = 'The book is saved successfully.';
				        toastr['success'](msg, title); 
				}
			});
        }

        function updateRow(oTable, nRow)
        {
        	var aData = oTable.fnGetData(update_save);

        	var old_title = aData[0];
        	var old_publisher = aData[1];
        	var old_public_year = aData[2];
        	var old_page = aData[3];
        	var old_read_cnt = aData[4];
        	var old_download_cnt = aData[5];

			var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 6, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 7, false);
            oTable.fnDraw();

            var title =    jqInputs[0].value;
            var publisher =   jqInputs[1].value;
            var public_year = jqInputs[2].value;
            var page =        jqInputs[3].value;
            var read_cnt =    jqInputs[4].value;
            var download_cnt =jqInputs[5].value;          
            
            $.ajax({
				type:'post',
				url:"{{url('/library_manage/book_update')}}",
				data:{
					_token:'<?php echo csrf_token() ?>',
					old_title : old_title,
					old_publisher : old_publisher,
					old_public_year : old_public_year,
					old_page : old_page,
					old_read_cnt : old_read_cnt,
					old_download_cnt : old_download_cnt,

					title : title,
					public_year : public_year,
					publisher : publisher,
					page : page,
					read_cnt : read_cnt,
					download_cnt : download_cnt,					
				},
				success:function(data){
					toastr.options = {
				        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
				        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
				        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
					
						var title = 'Success!';
				        var msg = 'The book is updated successfully.';
				        toastr['success'](msg, title); 
					
				}
			});
        }
        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '','','']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            createRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];

            var aData = oTable.fnGetData(nRow);

            var title =    aData[0];
            var publisher =   aData[1];
            var public_year = aData[2];
            var page =        aData[3];
            var read_cnt =    aData[4];
            var download_cnt =aData[5];          

            $.ajax({
				type:'post',
				url:"{{url('/library_manage/book_delete')}}",
				data:{
					_token:'<?php echo csrf_token() ?>',
					title : title,
					public_year : public_year,
					publisher : publisher,
					page : page,
					read_cnt : read_cnt,
					download_cnt : download_cnt,					
				},
				success:function(data){
					
					toastr.options = {
				        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
				        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
				        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
					
						var title = 'Success!';
				        var msg =  'One book is deleted successfully.';
				        toastr['warning'](msg, title);
				}
			});

            oTable.fnDeleteRow(nRow);
            
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            update_save = nRow;
            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
            } else if (nEditing == nRow && this.innerHTML == "Update") {
                /* Editing this row and want to save it */
                updateRow(oTable, nEditing);
                nEditing = null;
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
	});
</script>
@endsection