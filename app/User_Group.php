<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Group extends Model
{
	protected $table = "User_Group";
    protected $fillable = [
        'user_id', 'Group_id'
    ];
}
