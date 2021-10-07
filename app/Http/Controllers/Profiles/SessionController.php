<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index()
    {
        return view('profiles.session');
    }
    public function session_store(Request $request)
    {
        dd($request);
    }
}
