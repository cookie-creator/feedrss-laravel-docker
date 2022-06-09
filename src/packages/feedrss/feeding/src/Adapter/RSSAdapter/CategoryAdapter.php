<?php

namespace FeedrssFeeding\Adapter\RSSAdapter;

use Illuminate\Support\Facades\App;

class CategoryAdapter
{
    private $category;

    public function __construct($data)
    {
        $this->category = App::make('FeedrssFeeding\Contracts\CategoryInterface');

        $this->category->fill($data);
    }

    public function getCategory()
    {
        return $this->category;
    }
}
