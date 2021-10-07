<?php

namespace App\Http\Controllers\UserManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserManage\RoleAssign;
use DB;
use Auth;
use App\Model\UserManage\UserRole;
class RoleAssignController extends Controller
{
    public function role_assign(){
        
        $data = User::whereIn('status',['allow'])->get();
        return view('user_manage.role_assign',compact('data'));
    }

    //uncompleted function! where('email',$requests) is not implement.
    public function role_assign_user($id){
        
        $personal_role = DB::table('role_assigns as ra')->join('users','ra.user_id','=','users.id')->join('user_roles as ur','ra.role_id','=','ur.id')
                ->select('ra.*','users.name','users.email','ur.id','ur.parent_id','ur.menu_name')->where('ra.user_id',$id)->get();       
        $parent_menu = UserRole::whereNull('parent_id')->get();        
        $personal_data = array();
        foreach($parent_menu as $key)
        {
            foreach($personal_role as $value)
            {
                if ($value->parent_id == $key->id) {
                    array_push($personal_data, array(
                        'name' => $value->name,
                        'id' => $value->id,
                        'parent_menu' => $key->menu_name,
                        'menu' => $value->menu_name
                    ));
                }
            }
        }  
        $data = $this->getMenuTable();
        $table_data = array();
        foreach($data as $row)
        {
            $data1['id'] = $row['id'];
            $data1['parent_menu'] = $row['parent_menu'];
            $data1['menu'] = $row['menu'];
            $data1['url'] = $row['url'];
            $data1['check'] = $row['check'];
            foreach($personal_data as $key)
            {
                if ( $row['id'] == $key['id'])
                {
                    $data1['check'] = true;                    
                }
            }
            array_push($table_data, $data1);
        }
        $user_name = User::where('id',$id)->first()->name;
        $user_id = $id;
        $user_photo = User::where('id', $id)->first()->photo;
        return view('user_manage.personal_role_assign',compact('table_data','user_name','user_id', 'user_photo'));
    }

    public function getMenuTable(){

        $parent_menus = UserRole::whereNull('parent_id')->get();
        $baby_menus = UserRole::whereNotNull('parent_id')->get();
        $table_data = array();
        foreach($baby_menus as $row)
        {
            foreach($parent_menus as $key)
            {
                if ($row->parent_id == $key->id) {
                    $data['id'] = $row->id;
                    $data['parent_menu'] = $key->menu_name;
                    $data['menu'] = $row->menu_name;
                    $data['url'] = $row->url;
                    $data['user_cnt'] = $row->user_cnt;
                    $data['check'] = false;
                    array_push($table_data, $data);
                }
            }
        }
        return $table_data;
    }

    public function personal_role_check(Request $requests)
    {        
        if ( $requests->check_status == 'true' ) { 
            // return 'success';
            $data['user_id'] = $requests->user_id;
            $data['role_id'] = $requests->role_id;
            return RoleAssign::create($data);           
        }
        else if ( $requests->check_status == 'false' ){
            // return 'failed';
            return RoleAssign::where('role_id', $requests->role_id)->where('user_id',$requests->user_id)->delete();
        }   
    }
}
