<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    
    public function my_profile()
    {
        return view('profiles.my_profile');
    }
}
