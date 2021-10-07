@extends ('layouts.myapp')
@section ('extendCSS')

@endsection
@section ('content')

@endsection
@section ('extendJS')
<script type="text/javascript">
        try{
            $data['menu_name'] = $requests->parent_menu_name;
            UserRole::insert($data);
            return response()->json('success');
        }
        catch(Exception $e){
            return response()->json('failed');
        }
            $.ajax({
                type:'post',
                url:"{{url('')}}",
                data:{
                    _token:'<?php echo csrf_token() ?>',
                },
                success:function(data){
                    console.log(data);
                }
            });
</script>
@endsection    

href="{{action('UserManage\RoleAssignController@role_assign_user',$key->email)}}"



                                {!! Form::label('name', 'Name') !!}
                              {!! Form::text('name[]', null, ['class' => 'form-control name', 'required' => 'required']) !!}

<ul class="chats">
                                    <li class="in">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar1.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Bob Nilson </a>
                                            <span class="datetime">
                                            at 20:09 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    
                                    <li class="in">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar1.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Bob Nilson </a>
                                            <span class="datetime">
                                            at 20:30 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar3.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Richard Doe </a>
                                            <span class="datetime">
                                            at 20:33 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar3.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Richard Doe </a>
                                            <span class="datetime">
                                            at 20:35 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar1.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Bob Nilson </a>
                                            <span class="datetime">
                                            at 20:40 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar3.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Richard Doe </a>
                                            <span class="datetime">
                                            at 20:40 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="{{asset('assets/admin/layout/img/avatar1.jpg')}}"/>
                                        <div class="message">
                                            <span class="arrow">
                                            </span>
                                            <a href="javascript:;" class="name">
                                            Bob Nilson </a>
                                            <span class="datetime">
                                            at 20:54 </span>
                                            <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
                                        </div>
                                    </li>
                                </ul>