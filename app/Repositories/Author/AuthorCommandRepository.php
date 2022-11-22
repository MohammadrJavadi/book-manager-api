<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\Interfaces\Author\AuthorCommandRepositoryInterface;

class AuthorCommandRepository implements AuthorCommandRepositoryInterface
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
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Author_QB
     */
    private function query(): \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Author_QB
    {
        return Author::query();
    }
}
