<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, PageService $service)
    {
        $category = Category::where('slug', $request->slug)->first();
        $posts = $category->posts;
        $popularPosts = $service->getPopularPosts();
        $categories = $service->getPopularCategories();

        return view('public/category', compact(['category', 'posts', 'popularPosts', 'categories']));
    }
}
