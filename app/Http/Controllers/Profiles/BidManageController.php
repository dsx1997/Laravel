<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Model\Profiles\Bid;
class BidManageController extends Controller
{
    public function index(){

        // $data = DB::table('users')->where('email',Auth::user()->email)->first();  
        $data = Bid::where('user_id', Auth::user()->id)->get();
        return view('profiles.bid_manage',compact('data'));
    }
    public function add_new_bid(Request $request){
        $data = new Bid;
        $data['user_id'] = Auth::user()->id;
        $data['bid_name'] = $request->new_bid_name;
        $data['content'] = $request->new_content;
        $data->save();
        return 'success';
    }
    public function delete_bid($id) 
    {
        Bid::where('id', $id)->first()->delete();
        return redirect('/profiles/bid_edit');
    }
    public function update_bid(Request $request) 
    {    
        $data['bid_name'] = $request->bid_name;
        $data['content'] = $request->content;
        Bid::where('id', $request->bid_id)->first()->update($data);
        return "success";
        // return redirect('/profiles/bid_edit');
    }
}