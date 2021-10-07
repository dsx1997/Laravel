<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$url)
    {
        $user = Auth::user();        
        $is_auth = DB::table('role_assigns as ra')->join('user_roles as ur', 'ra.role_id', '=', 'ur.id')
                    ->where('ra.user_id' , Auth::user()->id)->where('ur.url',$url)->count();

        if(!$is_auth) return redirect('/home');
        return $next($request);
    }
}
