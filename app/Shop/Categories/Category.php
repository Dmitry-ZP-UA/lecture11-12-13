<?php

namespace App\Shop\Categories;

use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategories()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where('status', true);
    }

    /**
     * @param Builder $query
     * @param string $slug
     *
     * @return Builder
     */
    public function scopeBySlug(Builder $query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
}
