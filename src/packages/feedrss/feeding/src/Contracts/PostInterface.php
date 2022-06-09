<?php

namespace FeedrssFeeding\Contracts;

interface PostInterface
{
    public function getTitle();

    public function getLink();

    public function getDescription();

    public function getDate();

    public function getGuid();

    public function getCategories();
}
