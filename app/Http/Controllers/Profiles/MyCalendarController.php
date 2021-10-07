<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class MyCalendarController extends Controller
{
    public function my_calendar()
    {
        return view('profiles.my_calendar');
    }
}
