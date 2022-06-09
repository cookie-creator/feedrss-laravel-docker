<?php

namespace FeedrssFeeding\Adapter\RSSAdapter;

use FeedrssFeeding\Contracts\PostInterface;
use Illuminate\Support\Facades\App;

class PostAdapter
{
    private $posts = [];

    public function __construct($content)
    {
        $feed = simplexml_load_string($content);

        foreach ($feed->channel->item as $post)
        {
            $this->posts[] = $this->makePost($post);
        }
    }

    /*
     * @return Collection of posts
     * */
    public function getPosts()
    {
        return collect($this->posts);
    }

    private function makePost($xmlObj)
    {
            $post = App::make('FeedrssFeeding\Contracts\PostInterface');

            $data['title'] = $xmlObj->title->__toString();
            $data['link'] = $xmlObj->link->__toString();
            $data['description'] = $xmlObj->description->__toString();
            $data['date'] = $xmlObj->pubDate->__toString();
            $data['guid'] = $xmlObj->guid->__toString();
            $data['slug'] = str_replace('https://lifehacker.com/','', $xmlObj->link->__toString());

            $categories = [];
            foreach ($xmlObj->category as $xmlCategory)
            {
                $category = new CategoryAdapter($xmlCategory);
                $categories[] = $category->getCategory();
            }
            $data['category'] = collect($categories);
            $data['image'] = $this->getImageFromDescription($data['description']);
            $data['description'] = $this->clearDescription($data['description']);

            $post->fill($data);


        return $post;
    }

    private function clearDescription($description)
    {
        $description = strip_tags($description, '<p><em><br><strong><b>');
        $description = str_replace('<p>Read more...</p>', '', $description);
        $description = str_replace('...', '', $description);

        return $description;
    }

    private function getImageFromDescription($description)
    {
        $patttern = "/<img\s.*?src=(?:'|\")([^'\">]+)(?:'|\").*?\/?>/";

        if (preg_match($patttern, $description, $matches))
        {
            return $matches[1];
        }

        return '';
    }
}
