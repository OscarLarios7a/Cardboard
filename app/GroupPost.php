<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    protected $table = "Group_Post";
    protected $fillable = [
        'post_id','group_id'
    ];
}
