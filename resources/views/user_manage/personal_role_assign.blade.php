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
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <img alt="" class="img-circle" style="width: 40px; height: 40px" src="{{url('upload/photo/',$user_photo)}}
                                "/>{{$user_name}}'s Role Manage                               
                                
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
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
                                    Check
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($table_data as $key)                            
                                <tr>
                                    <td>
                                        {{$key['id']}}
                                    </td>
                                    <td>
                                        {{$key['parent_menu']}}
                                    </td>
                                    <td>
                                        {{$key['menu']}}
                                    </td>
                                    <td>
                                        {{$key['url']}}
                                    </td>
                                    <td>@if ($key['check'])
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="{{$key['menu']}}" class="md-check" checked>
                                            <label for="{{$key['menu']}}">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                             </label>
                                        </div>
                                        @else
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="{{$key['menu']}}" class="md-check">
                                            <label for="{{$key['menu']}}">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                             </label>
                                        </div>
                                        @endif
                                    </td>
                                </tr>                           
                            @endforeach
                            </tbody>
                            </table>
                            <input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                <div id="asdfasdf"></div>
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
        $('body').on('click', '.md-check',function(){
            var $input = $( this );
            var nRow = $(this).parents('tr')[0];
            var aData = oTable.fnGetData(nRow);
            
            
            var user_id = $("#user_id").val();
            var role_id = aData[0];
            var check_status = $input.prop( "checked" );

            $.ajax({
                type:'post',
                url:"{{url('/user_manage/personal_role_check')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                    user_id : user_id,
                    role_id : role_id,
                    check_status : check_status,
                },
                success:function(data){
                    console.log(data);
                }
            });
        });
          
    });
</script>
@endsection