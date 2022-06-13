<?php

namespace FeedrssFeeding;

use FeedrssFeeding\Adapter\RSSAdapter\FeedAPI;
use FeedrssFeeding\Adapter\RSSAdapter\PostAdapter;
use GuzzleHttp\Client;

class FeedRSS
{
    public static function get()
    {
        $feed = new FeedAPI(new Client());
        $content = $feed->getContent();
        $adapter = new PostAdapter($content);
        $posts = $adapter->getPosts();

        return $posts;
    }
}
