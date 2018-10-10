<?php

namespace App\Shop\ProductImages;

use App\Repositories\BaseRepository;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductImageRepository extends BaseRepository
{
    protected $productsRepo;

    /**
     * ProductImageRepository constructor.
     * @param ProductImage $productImage
     */
    public function __construct(ProductImage $productImage)
    {
        parent::__construct($productImage);
        $this->model = $productImage;
        $this->productsRepo = new ProductRepository(new Product());
    }

    /**
     * @return Product
     * @throws \App\Shop\Products\Exceptions\ProductNotFoundException
     */
    public function findProduct() : Product
    {
        return $this->productsRepo->findProductById($this->model->product_id);
    }

    /**
     * @param int $product_id
     * @return array|\Illuminate\Support\Collection
     */
    public function findProductImages(int $product_id) {
        try {
            return $this->findBy('product_id', $product_id);
        } catch (ModelNotFoundException $e) {
            return [];
        }
    }
}
