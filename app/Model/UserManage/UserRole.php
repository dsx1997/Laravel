<?php

namespace App\Model\UserManage;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';
    public $timestamps = true;
    protected $fillable = ['id', 'parent_id', 'menu_name', 'url','sort_display'];
}
