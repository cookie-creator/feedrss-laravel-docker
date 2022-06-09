<?php

namespace FeedrssFeeding\Concrete;

use FeedrssFeeding\Contracts\PostInterface;

class Post implements PostInterface
{
    private $guid;
    private $slug;
    private $title;
    private $link;
    private $image;
    private $description;
    private $category;
    private $date;

    /*
     * @param Object $post
     * */
    public function __construct()
    {

    }

    public function fill($post)
    {
        $this->guid = $post['guid'];
        $this->slug = $post['slug'];
        $this->title = $post['title'];
        $this->link = $post['link'];
        $this->description = $post['description'];
        $this->category = $post['category'];
        $this->image = $post['image'];

        $this->date = $post['date'];
    }

    /**
    *
    */

    public function getSlug()
    {
        return $this->slug;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getGuid()
    {
        return $this->guid;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCategories()
    {
        return $this->category;
    }
}
