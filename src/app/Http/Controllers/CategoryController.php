<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use FeedrssFeeding\Models\Category;
use FeedrssFeeding\Models\Post;
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
