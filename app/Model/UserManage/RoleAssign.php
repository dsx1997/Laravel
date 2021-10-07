<?php

namespace App\Model\UserManage;

use Illuminate\Database\Eloquent\Model;

class RoleAssign extends Model
{
    protected $table = 'role_assigns';
    protected $fillable = ['id','role_id','user_id'];
}
