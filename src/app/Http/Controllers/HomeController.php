<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use FeedrssFeeding\Models\Category;
use FeedrssFeeding\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(PageService $service)
    {
        $posts = $service->getLatestPosts();
        $popularPosts = $service->getPopularPosts();
        $categories = $service->getPopularCategories();

        return view('public/home', compact(['posts', 'popularPosts', 'categories']));
    }
}
