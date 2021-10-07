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
            <div class="modal fade" id="add_parent_menu_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Parent Menu</h4>
                        </div>
                        <div class="modal-body">
                            <label>Parent Menu Name</label>
                             <input type="text" id="parent_menu_name" name="parent_menu_name">
                             <div id="menu_row">

                             </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn blue" id="parent_menu_add_btn" name="parent_menu_add_btn" value="Save Menu">
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
            Edit user Roles.
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
                                <a href="javascript:;" class="config">
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
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <button id="parent_menu_add_modal_btn" class="btn green" href="#add_parent_menu_modal" data-toggle="modal">
                                            Add Parent Menu <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn btn-primary">
                                            Add Baby Menu <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                                     Parent Menu
                                </th>
                                <th>
                                     Menu
                                </th>
                                <th>
                                     URL
                                </th>
                                <th>
                                     Display Sort
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
                            @foreach ($table_data as $key)                            
                                <tr>
                                    <td>
                                        {{$key['parent_menu']}}
                                    </td>
                                    <td>
                                        {{$key['menu']}}
                                    </td>
                                    <td>
                                        {{$key['url']}}
                                    </td>
                                    <td>
                                        {{$key['sort_display']}}
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
        $("#parent_menu_add_btn").on('click', function(){
            var menu_name = $("#parent_menu_name").val();
            $.ajax({
                type:'post',
                url:"{{url('/user_manage/add_parent_menu')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                        menu_name : menu_name,
                },
                success:function(data){ 
                    console.log(data);
                    $("#add_parent_menu_modal").modal('hide');
                }
            });
        });
        $("#parent_menu_add_modal_btn").on('click', function(){
            $.ajax({
                type:'post',
                url:"{{url('/user_manage/get_parent_name')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                },
                success:function(data){
                    console.log('qwer');
                    console.log(data);
                    for(var i = 0; i < data.length; i++){
                        $("#menu_row").append('<div style="margin-left: 80px;"><i class="icon-basket"></i><span class="title">'+ data[i] +' </span></div>');          
                    }
                }    
            });
            

        });
        var update_save = '';

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function createRow(oTable, nRow, data) {            
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            var html = '<select class="form-control"><option value=""></option>';
            for (var i = data.length - 1; i >= 0; i--) {
                html += '<option value="' + data[i] + '">'+ data[i] +'</option>';
            }
            html += '</select>';
            jqTds[0].innerHTML = html;
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<select class="form-control"><option value="none">none</option><option value="sidebar">sidebar</option><option value="logo">logo</option></select>';
            jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }
        function editRow(oTable, nRow, data) {     
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            var html = '<select class="form-control"><option value="' + aData[0] + '">' + aData[0] + '</option>';
            for (var i = data.length - 1; i >= 0; i--) {
                html += '<option value="' + data[i] + '">'+ data[i] +'</option>';
            }
            html += '</select>';
            jqTds[0].innerHTML = html;
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<select class="form-control"><option value="' + aData[3] + '">' + aData[3] + '</option><option value="none">none</option><option value="sidebar">sidebar</option><option value="logo">logo</option></select>';
            jqTds[4].innerHTML = '<a class="edit" href="">Update</a>';
            jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var nRow1 = nRow;
            var jqSelect = $('select', nRow1);
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqSelect[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
            oTable.fnUpdate(jqSelect[1].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
            oTable.fnDraw();

            var parent_menu =    jqSelect[0].value;
            var menu =   jqInputs[0].value;
            var url = jqInputs[1].value;        
            var sort_display = jqSelect[1].value;
            $.ajax({
                type:'post',
                url:"{{url('/user_manage/role_register')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    parent_menu : parent_menu,
                    menu : menu,
                    url : url,                   
                    sort_display : sort_display,
                },
                success:function(data){

                        toastr.options = {
                        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
                        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
                        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
                    if(data == 'success'){      
                    
                        var title = 'Success!';
                        var msg = 'The role is added successfully.';
                        toastr['success'](msg, title); 
                    }else if(data == 'failed'){

                        var title = 'Error!';
                        var msg = 'An error occured';
                        toastr['error'](msg, title);
                        
                    }
                }
            });
        }

        function updateRow(oTable, nRow)
        {
            var aData = oTable.fnGetData(update_save);

            var old_parent_menu = aData[0];
            var old_menu = aData[1];
            var old_url = aData[2];
            var old_sort_display = aData[3];

            var nRow1 = nRow;
            var jqSelect = $('select', nRow1);
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqSelect[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
            oTable.fnUpdate(jqSelect[1].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
            oTable.fnDraw();

            var parent_menu =     jqSelect[0].value;
            var menu =            jqInputs[0].value;
            var url =             jqInputs[1].value;   
            var sort_display = jqSelect[1].value;

                $.ajax({
                    type:'post',
                    url:"{{url('/user_manage/role_update')}}",
                    data:{
                        _token:'<?php echo csrf_token() ?>',
                        old_parent_menu : old_parent_menu,
                        old_menu : old_menu,
                        old_url : old_url,
                        old_sort_display : old_sort_display,
                        parent_menu : parent_menu,
                        menu : menu,
                        url : url,  
                        sort_display : sort_display,               
                    },
                    success:function(data){
                        console.log(data);

                            toastr.options = {
                            closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
                            showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
                            showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
                        if(data == 'success'){
                            var title = 'Success!';
                            var msg = 'The role is updated successfully.';
                            toastr['success'](msg, title); 

                        }else if (data == 'failed') {

                            var title = 'Error!';
                            var msg = 'The role is not updated successfully.';
                            toastr['error'](msg, title); 
                        }
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

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 20,

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

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            $.ajax({
                type:'post',
                url:"{{url('/user_manage/get_parent_name')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                },
                success:function(data){
                    console.log(data);
                    createRow(oTable, nRow, data);
                }
            });
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

            var parent_menu =    aData[0];
            var menu =   aData[1];
            var url = aData[2];   
            var sort_display = aData[3];
            $.ajax({
                type:'post',
                url:"{{url('/user_manage/role_delete')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    parent_menu : parent_menu,
                    menu : menu,
                    url : url,
                    sort_display : sort_display,        
                },
                success:function(data){
                    console.log(data);
                    toastr.options = {
                        closeButton: true, debug: true, positionClass: 'toast-top-right', onclick: null,
                        showDuration : 500, hideDuration : 500, timeOut : 5000, extendedTimeOut : 1000,
                        showEasing : 'swing', hideEasing : 'linear', showMethod : 'fadeIn', hideMethod : 'fadeOut'};
                    
                        var title = 'Success!';
                        var msg =  'One role is deleted successfully.';
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
                $.ajax({
                    type:'post',
                    url:"{{url('/user_manage/get_parent_name')}}",
                    data:{
                        _token:'<?php echo csrf_token() ?>',
                    },
                    success:function(data){
                        console.log(data);
                        editRow(oTable, nRow, data);
                    }
                });
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
                $.ajax({
                    type:'post',
                    url:"{{url('/user_manage/get_parent_name')}}",
                    data:{
                        _token:'<?php echo csrf_token() ?>',
                    },
                    success:function(data){
                        console.log(data);
                        editRow(oTable, nRow, data);
                    }
                });
                nEditing = nRow;
            }
        });
    });
</script>
@endsection