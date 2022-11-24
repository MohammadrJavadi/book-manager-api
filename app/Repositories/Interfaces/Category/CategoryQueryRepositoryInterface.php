<?php

namespace App\Repositories\Interfaces\Category;

interface CategoryQueryRepositoryInterface
{
    public function all();

    public function get(int $id);

    public function getTitle();
}
