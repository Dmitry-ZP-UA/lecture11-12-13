<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $category;

    /**
     * @var Product
     */
    private $product;

    /**
     * HomeController constructor.
     * @param Category $category
     */
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
        //$this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

//        $category = new Category();
//        $category->name = 'New Category';
//        $category->slug = "New slug";
//        $category->description = "New description";
//        $category->save();

//        $category = $this->category->destroy(1);
//
//        dd($category);


//        $cat1 = $this->categoryRepo->findCategoryById(1);
//        $cat2 = $this->categoryRepo->findCategoryById(2);


//        $product = $this->product->where('slug', 'Product_1')->first();
//        dd($product->formatted);
        $product = [
            'name' => 'TOSHIBA',
            'slug' => 'toshiba',
            'category_id' => 2,
            'price' => 200,
            'description' => 'some ...',
            'quantity' => 2,
            'cover' => '',
            'status' => false
        ];


//
//        $productModel = $this->product->create($product);
//        dd($productModel);

        $productModel = $this->product->available()->get();
        dd($productModel);

        return view('front.index', compact('cat1', 'cat2'));
    }
}
