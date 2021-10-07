<?php

namespace App\Model\Eleclib;

use Illuminate\Database\Eloquent\Model;

class Eleclib extends Model
{
    protected $table = 'eleclibs';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','sort_id','booknumber','title','keyword','content','writer','page','read_cnt','download_cnt','public_year','publisher'];
}
