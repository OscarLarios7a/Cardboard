<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = "Category_Post";
    protected $fillable = [
        'category_id', 'post_id'
    ];
}
