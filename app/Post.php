<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table ="Post";
    protected $fillable = [
        'TitlePost', 'InfoPost','Imgpost','Category_id'
    ];
}
