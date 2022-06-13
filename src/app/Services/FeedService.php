<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\FeedRepository;
use App\Helpers\ImageUploadHelper;
use FeedrssFeeding\FeedRSS;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FeedService
{
    private ImageUploadHelper $imageUploadHelper;
    private FeedRepository $feedRepository;

    public function __construct(ImageUploadHelper $imageUploadHelper, FeedRepository $feedRepository)
    {
        $this->imageUploadHelper = $imageUploadHelper;
        $this->feedRepository = $feedRepository;
    }

    public function getPosts()
    {
        return FeedRSS::get();
    }

    public function storePosts(Collection $feedPosts)
    {
        $user = $this->feedRepository->getFirtsUser();

        foreach ($feedPosts as $feedPost)
        {
            // checkUnique and check if we have description
            if ($this->feedRepository->isUniqueGuid($feedPost->getGuid()) && $feedPost->getDescription() !== '')
            {
                try {

                    DB::beginTransaction();
                    // create Models/Post
                    $post = $this->feedRepository->storePost($user, $feedPost);

                    // Upload image, save it and attach to post
                    $imageName = $this->uploadImage($feedPost->getImage());
                    if ($imageName)
                    {
                        $this->feedRepository->storeImage($post, $imageName);
                    }

                    // Check new categories and attach to post
                    $this->attachCategories($post, $feedPost->getCategories());

                    DB::commit();

                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    /*
     * @param String $url
     * @return String imageName
     * */
    private function uploadImage($url)
    {
        return $this->imageUploadHelper->storeImage($url);
    }

    /*
    * @param FeedrssFeeding\Models\Post $post
    */
    private function attachCategories(Post $post, Collection $feedCategories)
    {
        foreach ($feedCategories as $feedCategory)
        {
            $this->feedRepository->attachNewCategoryToPost($post, $feedCategory);
        }
    }
}
