<?php

namespace App\Model\Profiles;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = 'inboxes';
    protected $fillable = ['sender_id','receiver_id','send_time','receive_time','read_time','msg_content','view_method'];
}
