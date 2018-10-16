<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $category;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(string $slug)
    {
        $category = $this->category->where('slug', $slug);
        $products = $category->products()->where('status', 1)->all();
        return view('front.categories.category', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
