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
</style>
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
            Role Assign
            </h3>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Choose the user you want to assign a role to.
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
                                    User Id
                                </th>
                                <th>
                                    User Name
                                </th>
                                <th style="width: 60px;">
                                    Image
                                </th>
                                <th>
                                     Email
                                </th>
                                <th style="width: 50px;">
                                     Logged
                                </th>
                                <th>
                                     Created at
                                </th>
                                <th>
                                     Latest visited
                                </th>
                                <th>
                                     Assign Role
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key)                            
                                <tr>
                                    <td>
                                        {{$key->id}}
                                    </td>
                                    <td>
                                        {{$key->name}}
                                    </td>
                                    <td>
                                        <img src='{{url("upload/photo/{$key->photo}")}}'  class="img-circle" alt="" style="width: 45px; height: 45px;">
                                    </td>
                                    <td>
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
                                        <a href="{{action('UserManage\RoleAssignController@role_assign_user',$key->id)}}" class="assign_role" >Assign Role</a>
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
    });
</script>
@endsection