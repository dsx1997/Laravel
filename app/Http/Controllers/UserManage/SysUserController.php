<?php

namespace App\Http\Controllers\UserManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class SysUserController extends Controller
{
    public function sys_users()
    {   $data = User::get();
        return view('user_manage.sys_users',compact('data'));
    }
    public function user_status_change(Request $request)
    {
        $data['status'] = $request->user_status_value;
        User::where('id', $request->user_statu_id)->first()->update($data);
        return redirect('/user_manage/sys_users');
    }
}
