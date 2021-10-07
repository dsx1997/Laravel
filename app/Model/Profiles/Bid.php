<?php

namespace App\Model\Profiles;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';
    protected $fillable = ['id','bid_name','content','record_time'];
}
