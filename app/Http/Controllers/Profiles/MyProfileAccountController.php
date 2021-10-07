<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
use Illuminate\Support\Facades\Auth;
use App\User;
class MyProfileAccountController extends Controller
{
    
    public function my_account()
    {        
        $data = DB::table('users')->where('email',Auth::user()->email)->first();        
        return view('profiles.my_account',compact('data'));
    }
    public function update_personal_info(Request $requests)
    {
        $data['Mobile_Number'] = $requests->Mobile_Number;
        $data['Interests'] = $requests->Interests;
        $data['Occupation'] = $requests->Occupation;
        $data['About'] = $requests->About;
        $data['Website_Url'] = $requests->Website_Url;
        $res = DB::table('users')->where('email',Auth::user()->email)->update($data);
        return response()->json($res) ;
    }
    public function check_change_password(Request $requests)
    {
        
        $login_result = Auth::attempt([
            'email' => Auth::user()->email,
            'password' => $requests ->oldpassword,
        ]);

        if ($login_result) {
            if ($requests->newpassword == $requests->repassword) {
                $data['password'] = bcrypt($requests->newpassword);
                $check_result = 'change_success';
                DB::table('users')->where('email',Auth::user()->email)->update($data);                
            }
            else{
                $check_result = 'unmatched_password';
            }
        }
        else{
            $check_result = 'wrong_oldpassword';
        }
        return response()->json($check_result);
    }
    public function photo_upload(Request $request)
    { 
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png|max:10240'
        ]); 
        
        if ($request->hasFile('image')) {

            $photo_name =  Auth::user()->photo;
            if ($photo_name != null) {
                
                $is_photo = public_path("upload/photo/{$photo_name}");
                if (File::exists($is_photo)) unlink($is_photo);
            }   
                $image = $request->file('image');
                $fileName = str_random(30).'.'.$image->guessClientExtension();
                $image->move('upload/photo/',$fileName);
                $item['photo'] = $fileName;
                User::where('id', Auth::user()->id)->update($item);
                   
        return redirect()->route('/my_account');
        
        }
    }
}
















