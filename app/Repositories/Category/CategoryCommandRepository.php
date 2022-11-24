<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryCommandRepositoryInterface;

class CategoryCommandRepository implements CategoryCommandRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function create(array $data)
    {
        return $this->query()->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->query()->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->query()->find($id)->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Category_QB
     */
    private function query(): \LaravelIdea\Helper\App\Models\_IH_Category_QB|\Illuminate\Database\Eloquent\Builder
    {
        return Category::query();
    }
}
