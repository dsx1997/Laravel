<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\UserManage\UserRole;
use App\Model\UserManage\RoleAssign;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function getMenu()
    {
        $parent = UserRole::whereNull('parent_id')->where('sort_display','sidebar')->get();
        $data = DB::table('user_roles as ur')->join('role_assigns as ra', 'ur.id', '=', 'ra.role_id')->select('ur.id','ur.parent_id','ur.menu_name','ur.url')
                                            ->where('ra.user_id',Auth::user()->id)
                                            ->where('ur.sort_display','sidebar')->get();
                                           
        $array_data = array();
        foreach($parent as $key)
        {
                    array_push($array_data , array(
                        'id'        => $key->id,
                        'parent_id' => $key->parent_id,
                        'menu_name' => $key->menu_name,
                        'url'       => $key->url,

                    ));
            foreach($data as $value)
            {
                if ($value->parent_id == $key->id) {
                    array_push($array_data , array(
                        'id'        => $value->id,
                        'parent_id' => $value->parent_id,
                        'menu_name' => $value->menu_name,
                        'url'       => $value->url,

                    ));
                }
            }
        }
        return response()->json($array_data);
    }
}
