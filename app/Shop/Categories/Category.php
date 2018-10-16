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
        'id',
        'slug',
        'created_at',
        'updated_at'
    ];

    /**
     * @param string $name
     */
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = strtolower(trim($name));
        $this->attributes['slug'] = str_replace(' ', '-', trim(strtolower($name)));
    }

    /**
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }

    /**
     * @param string $description
     */
    public function setDescriptionAttribute(string $description)
    {
        $this->attributes['description'] = trim($description);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAllParentCategories($query)
    {
        return $this->where('parent_id', null);
    }

}
