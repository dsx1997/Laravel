<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Profiles\Inbox;
class MyInboxController extends Controller
{
    public function my_inbox()
    {
        return view('profiles.my_inbox');
    }
    public function getSysUser() {
        $user = User::get();
        return response()->json($user);
    }
    public function postMessage(Request $request) {
        // return response()->json($request);
        $data = new Inbox;
        $data['sender_id'] = $request->sender_id;
        $data['receiver_id'] = $request->receiver_id;
        $data['msg_content'] = $request->msg_content;
        $data['send_time'] = $request->send_time;
        $data->save();

        $result['photo'] = User::where('id', $request->sender_id)->first()->photo;
        $result['name'] = User::where('id', $request->sender_id)->first()->name;
        $result['send_time'] = $request->send_time;
        $result['msg_content'] = $request->msg_content;
        return response()->json($result);
    }
    public function getChatData(Request $request) {
        $send_message = Inbox::where('sender_id', $request->sender_id)->where('receiver_id', $request->receiver_id)->get();
        $receive_message = Inbox::where('receiver_id', $request->sender_id)->where('sender_id', $request->receiver_id)->get();
        $all_message = array();
        foreach($send_message as $key)
        {
            array_push($all_message, $key);
        }  
        foreach($receive_message as $value)
        {
            array_push($all_message, $value);
        }  
        sort($all_message);        
        return response()->json($all_message);
    }
    public function getNewMessage(Request $request)
    {
        $receive_message = Inbox::where('receiver_id', $request->sender_id)->get();
        $all_message = array();
        foreach($receive_message as $value)
        {
            array_push($all_message, $value);
        }  
        sort($all_message);        
        return response()->json($all_message);
    }
}
