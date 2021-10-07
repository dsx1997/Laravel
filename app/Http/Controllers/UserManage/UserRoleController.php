<?php

namespace App\Http\Controllers\UserManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserManage\UserRole;
class UserRoleController extends Controller
{
    public function userrole_manage()
    {
        $parent_menus = UserRole::whereNull('parent_id')->get();
        $baby_menus = UserRole::whereNotNull('parent_id')->get();
        $table_data = array();
        foreach($baby_menus as $row)
        {
            foreach($parent_menus as $key)
            {
                if ($row->parent_id == $key->id) {
                    $data['parent_menu'] = $key->menu_name;
                    $data['menu'] = $row->menu_name;
                    $data['url'] = $row->url;
                    $data['sort_display'] = $row->sort_display;
                    array_push($table_data, $data);
                }
            }
        }
        return view('user_manage.userrole_manage',compact('table_data'));
    }
    public function add_parent_menu(Request $requests)
    { 
        $data = new UserRole;
        $data['parent_id'] = null;
        $data['menu_name'] = $requests->menu_name;
        $data['url'] = null;
        $data['created_at'] = null;
        $data['updated_at'] = null;
        $data->save();
        return 'success';
    }
    public function role_register(Request $requests)
    {
        try{
                $parent_menu_name = UserRole::where('menu_name', $requests->parent_menu)->first();
                $data['parent_id'] = $parent_menu_name->id;
                $data['menu_name'] = $requests->menu;
                $data['url'] = $requests->url;
                $data['sort_display'] = $requests->sort_display;
                UserRole::create($data);
                return response()->json('success');
        }
        catch(Exception $e)
        {
                return response()->json('failed');
        }
    }
    public function get_parent_name(Request $requests)
    {
        $table_data = array();
        $data = UserRole::whereNull('parent_id')->get();
        foreach($data as $key)
        {
            array_push($table_data, $key->menu_name);
        }
        return response()->json($table_data);
    }
    public function role_update(Request $requests)
    {
        try{
            $old_menu_parent = UserRole::where('menu_name',$requests->old_parent_menu)->first();
            $new_menu_parent = UserRole::where('menu_name',$requests->parent_menu)->first();
            $update_data['parent_id'] = $new_menu_parent->id;
            $update_data['menu_name'] = $requests->menu;
            $update_data['url'] = $requests->url;
            $update_data['sort_display'] = $requests->sort_display;
            UserRole::where('parent_id',$old_menu_parent->id)->
                        where('menu_name', $requests->old_menu)->
                        where('sort_display', $requests->old_sort_display)->
                        where('url', $requests->old_url)->update($update_data);
                        return response()->json('success');

        }
        catch(Exception $e){
            return response()->json('failed');
        }

    }
    public function role_delete(Request $requests)
    {
        $parent_id = UserRole::whereNull('parent_id')->where('menu_name',$requests->parent_menu)->first();
        return UserRole::where('parent_id', $parent_id->id)
                        ->where('menu_name', $requests->menu)
                        ->where('sort_display', $requests->sort_display)
                        ->where('url', $requests->url)->delete();
    }
}
