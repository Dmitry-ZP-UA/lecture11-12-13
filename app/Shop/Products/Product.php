<?php

namespace App\Shop\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return '$' . $this->price / 100;
    }

    /**
     * @param string $price
     */
    public function setPriceAttribute(string $price)
    {
        $this->attributes['price'] = bcmul($price, 100);
    }

    /**
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = strtolower(trim($name));
        $this->attributes['slug'] = str_replace(' ', '-', trim(strtolower($this->name)));
    }

    /**
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }

    /**
     * @return mixed
     */
    public function scopeAvailable()
    {
        return $this->where('status', true);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUnAvailable($query)
    {
        return $this->where('status', false);
    }

    /**
     * @param int $categoryId
     * @return mixed
     */
    public function scopeCategoryId(int $categoryId)
    {
        return $this->where('category_id', $categoryId);
    }

    /**
     * @return string
     */
    public function getFormattedCoverAttribute()
    {
        return "public/images/ProductCover" . $this->cover;
    }



}
