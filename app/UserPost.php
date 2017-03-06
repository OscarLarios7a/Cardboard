<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    protected $table = "User_Post";
    protected $fillable = [
        'user_id', 'post_id'
    ];
}
