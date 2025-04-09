<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'tbl_logs';
    public $timestamps = false;

    protected $fillable = ['user_id', 'timestamp'];
}
