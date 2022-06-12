<?php

namespace App\Services;

use FeedrssFeeding\Models\Category;
use FeedrssFeeding\Models\Post;
use Ramsey\Collection\Collection;

class PageService
{
    public function getLatestPosts()
    {
        return Post::orderBy('updated_at', 'desc')->limit(12)->get();
    }

    public function getPopularPosts()
    {
        return Post::inRandomOrder()->limit(4)->get();
    }

    public function getPopularCategories()
    {
        return Category::inRandomOrder()->limit(30)->get();
    }
}
