<?php

namespace App\Model\Eleclib;

use Illuminate\Database\Eloquent\Model;

class EleclibSort extends Model
{
    protected $table = 'eleclib_sorts';
    protected $fillable = ['id','parent_id','sort_name'];
}
