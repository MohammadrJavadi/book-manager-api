<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryQueryRepositoryInterface;

class CategoryQueryRepository implements CategoryQueryRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Category::all();
    }

    public function get(int $id)
    {
        return $this->query()->find($id);
    }

    public function getTitle()
    {
        return $this->query()->pluck("title");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Category_QB
     */
    private function query(): \LaravelIdea\Helper\App\Models\_IH_Category_QB|\Illuminate\Database\Eloquent\Builder
    {
        return Category::query();
    }
}
