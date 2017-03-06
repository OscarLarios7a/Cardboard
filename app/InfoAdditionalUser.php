<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoAdditionalUser extends Model
{
    protected $table = "info_additional_user";
    protected $fillable = [
        'PersonalRow', 'Description','user_id'
    ];
}
