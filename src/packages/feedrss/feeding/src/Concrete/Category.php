<?php

namespace FeedrssFeeding\Concrete;

use FeedrssFeeding\Contracts\CategoryInterface;

class Category implements CategoryInterface
{
    private $title;
    private $slug;

    /**
    * @param String $category
     */
    public function __construct()
    {

    }

    public function fill(String $category)
    {
        $this->title = $category;
        $this->slug = str_replace(' ', '-', $category);
    }

    /**
     * @return String $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return String $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
