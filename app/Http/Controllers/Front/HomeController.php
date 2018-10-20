<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;


class HomeController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * HomeController constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        dd($categories = $this->category->with(['images', 'subCategories'])->parent()->get());

        return view('front.index', [
            'categories' => $categories
        ]);


    }
}
