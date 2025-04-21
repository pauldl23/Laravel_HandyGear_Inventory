<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'userID';
    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'firstname', 'lastname', 'usertype',
    ];

    protected $hidden = ['password'];
}
