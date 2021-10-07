<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockScreenController extends Controller
{
    public function lock_screen()
    {
        return view('profiles.lock_screen');
    }
}
