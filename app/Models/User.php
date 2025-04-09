<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'userID';
    protected $fillable = ['username', 'password', 'usertype'];
    public $timestamps = false; // unless your table has `created_at`, `updated_at`

    protected $hidden = ['password'];
}
