<?php

namespace App\Http\Controllers\ElecLibrary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eleclib\Eleclib;
use DB;
class ElecLibraryController extends Controller
{
    public function book_manage()
    {
        $data = Eleclib::get();
        return view('eleclib.book_manage', compact('data'));
    }
    public function book_register(Request $requests)
    {
                $data['title'] = $requests->title;
                $data['publisher'] = $requests->publisher;
                $data['public_year'] = $requests->public_year;
                $data['page'] = $requests->page;
                $data['read_cnt'] = $requests->read_cnt;
                $data['download_cnt'] = $requests->download_cnt;
                Eleclib::create($data);
                return redirect('book_manage');
    }
    public function book_delete(Request $requests){
        return Eleclib::where('title', $requests->title)
        ->where('publisher', $requests->publisher)
        ->where('public_year', $requests->public_year)
        ->where('page', $requests->page)
        ->where('read_cnt', $requests->read_cnt)
        ->where('download_cnt', $requests->download_cnt)->delete();
                        
    }
    public function book_update(Request $requests)
    {
                $data['title'] = $requests->title;
                $data['publisher'] = $requests->publisher;
                $data['public_year'] = $requests->public_year;
                $data['page'] = $requests->page;
                $data['read_cnt'] = $requests->read_cnt;
                $data['download_cnt'] = $requests->download_cnt;

        return Eleclib::where('title', $requests->old_title)
        ->where('publisher', $requests->old_publisher)
        ->where('public_year', $requests->old_public_year)
        ->where('page', $requests->old_page)
        ->where('read_cnt', $requests->old_read_cnt)
        ->where('download_cnt', $requests->old_download_cnt)->update($data);
    }
}
