<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $category;

    /**
     * CategoryController constructor.
     *
     * @param Category $category
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
        $categories = $this->category->with(['products'])->get();
        $parentCategories = $categories->where('parent_id', null);
        $category = $categories->where('slug', $slug)->first();

        return view('front.categories.category', [
            'categories' => $parentCategories,
            'category' => $category
        ]);
    }
}
