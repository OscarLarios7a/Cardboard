<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table ="Comments";
    protected $fillable = [
        'Comment','user_id','post_Id'
    ];
}
