<?php

namespace App\Shop\Products;

use App\Shop\Categories\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'status',
        'slug'
    ];

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where('status', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function category()
   {
    return $this->belongsTo(Category::class);
   }
}
