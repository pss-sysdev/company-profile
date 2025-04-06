<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class M_User extends Authenticatable
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password',
    ];
}
