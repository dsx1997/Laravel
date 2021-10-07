<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyTaskController extends Controller
{
    public function my_tasks()
    {
        return view('profiles.my_tasks');
    }
}
