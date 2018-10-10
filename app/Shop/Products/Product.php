<?php

namespace App\Shop\Products;

use App\Exceptions\NotImplementedException;
use App\Models\Model;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\ProductImages\ProductImage;
use App\Shop\ProductImages\ProductImageRepository;
use App\Shop\Products\Repositories\ProductRepository;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Support\Collection;

class Product extends Model implements Buyable
{
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 5
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cover',
        'quantity',
        'price',
        'status',
        'sale_price',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $categoryRepo;
    protected $productRepo;
    protected $productImageRepo;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @return CategoryRepository
     */
    public function getCategoryRepository() {
        $category_id = $this->getAttribute('category_id');
        return $this->categoryRepo ?:
            $this->categoryRepo = new CategoryRepository(
                new Category(['id' => $category_id])
            );
    }

    /**
     * @return ProductRepository
     */
    public function getProductRepository() {
        return $this->productRepo ?:
            $this->productRepo = new ProductRepository($this);
    }

    /**
     * @return ProductImageRepository
     */
    public function getProductImageRepository() {
        return $this->productImageRepo ?:
            $this->productImageRepo = new ProductImageRepository(new ProductImage());
    }

    /**
     * @return Collection
     * @throws Exceptions\ProductNotFoundException
     */
    public function categories()
    {
        $category_id = $this->getAttribute('category_id');
        return $this->getCategoryRepository()->findBy('id', $category_id);
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @param null $options
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @param null $options
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @param null $options
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * @return array|Collection
     */
    public function images()
    {
        return $this->getProductImageRepository()->findProductImages($this->getAttribute('id'));// $this->hasMany(ProductImage::class);
    }

    /**
     * @param string $term
     * @return Collection
     */
    public function searchProduct(string $term) : Collection
    {
        throw new NotImplementedException();
        //return self::search($term)->get();
    }
}
