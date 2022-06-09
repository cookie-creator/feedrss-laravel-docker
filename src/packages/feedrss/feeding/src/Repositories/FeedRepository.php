<?php

namespace FeedrssFeeding\Repositories;

use App\Models\User;
use FeedrssFeeding\Models\Category;
use FeedrssFeeding\Models\Image;
use FeedrssFeeding\Models\Post;
use FeedrssFeeding\Contracts\CategoryInterface;

class FeedRepository
{
    public function __construct()
    {

    }

    /**
     * By default all feed goes to first seeded user
    */
    public function getFirtsUser()
    {
        return User::find(1);
    }

    /**
     * @param User $user
     * @param PostInterface $feedPost
     * */
    public function storePost($user, $feedPost)
    {
        $post = new Post();

        $post->guid = $feedPost->getGuid();
        $post->slug = $feedPost->getSlug();

        $post->title = $feedPost->getTitle();
        $post->link = $feedPost->getLink();
        $post->description = $feedPost->getDescription();

        $user->posts()->save($post);

        return $post;
    }

    /**
     * @param Post $post
     * @param string $imageName
    */
    public function storeImage(Post $post, string $imageName)
    {
        $image = new Image();
        $image->name = $imageName;
        $post->image()->save($image);
    }

    /**
     * @param Post $post
     * @param CategoryInterface $feedCategory
     * */
    public function attachNewCategoryToPost(Post $post, $feedCategory)
    {
        $category = new Category();
        $category->title = $feedCategory->getTitle();
        $category->slug = $feedCategory->getSlug();
        $category->save();

        $post->assignCategory($category);
    }

    /**
     * @param string $guid
     */
    public function isUniqueGuid(string $guid)
    {
        return (Post::where('guid',$guid)->first()) ? false : true;
    }
}
