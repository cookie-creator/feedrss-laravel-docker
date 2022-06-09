<?php

namespace FeedrssFeeding;

use FeedrssFeeding\Adapter\RSSAdapter\FeedAPI;
use FeedrssFeeding\Services\FeedService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FeedrssFeedingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FeedrssFeeding\Contracts\CategoryInterface', 'FeedrssFeeding\Concrete\Category');
        $this->app->bind('FeedrssFeeding\Contracts\PostInterface', 'FeedrssFeeding\Concrete\Post');
        $this->app->bind('feedrss', function () {
            return new FeedRSS();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/feed.php', 'feed'
        );

        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }
}
