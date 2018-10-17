<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;

class CategoryController extends Controller
{
    /**
     * @var Category
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
     * Find the category via the slug
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategory(string $slug)
    {
        $categories = $this->category->all();
        $parentCategory = $categories->where('parent_id', null);
        $category = $categories->where('slug', $slug)->first();

        $products = $category->products()->available()->get();

        return view('front.categories.category', [
            'categories' => $parentCategory,
            'category' => $category,
            'products' => $products
        ]);
    }
}
