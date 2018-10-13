<?php

namespace App\Shop\Categories;

// use App\Shop\Products\Product;

use App\Exceptions\NotImplementedException;
use App\Models\Model;
use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\ProductRepository;

class Category2 extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover'
    ];

    protected $table = 'categories';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $productsRepo;
    protected $categoriesRepo;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @return ProductRepository
     */
    public function getProductRepository() {
        return $this->productsRepo ?:
            $this->productsRepo = new ProductRepository(new Product());
    }

    /**
     * @return CategoryRepository
     */
    public function getCategoryRepository() {
        return $this->categoriesRepo ?:
            $this->categoriesRepo = new CategoryRepository($this);
    }

    public function products(bool $withChildren = true)
    {
        return $this->findProductsWithChildren($this, $withChildren);
    }

    public function parent()
    {
        return $this->getCategoryRepository()->find($this->getAttribute('parent_id'));
    }

    public function children()
    {
        return $this->getCategoryRepository()->findBy('parent_id', $this->getAttribute('id'));
    }

    private function findProductsWithChildren(Category $category, bool $withChildren)
    {
        $category_id = $category->getAttribute('id');
        $products = $this->getProductRepository()->findBy('category_id', $category_id);

        if($withChildren) {
            $childrenCategories = $category->children();
            foreach ($childrenCategories as $child) {
                $childs = $this->findProductsWithChildren($child, true);
                $products = $products->merge($childs);
            }
        }

        return $products;
    }
}
