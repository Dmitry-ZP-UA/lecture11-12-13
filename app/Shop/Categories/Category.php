<?php

namespace App\Shop\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    protected $fillable = [
//        'name',
//        'slug',
//        'description',
//        'parent_id'
//    ];

    protected $guarded = [
        'id'
    ];
}
