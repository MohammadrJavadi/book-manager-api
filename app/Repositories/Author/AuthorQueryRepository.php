<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\Interfaces\Author\AuthorQueryRepositoryInterface;

class AuthorQueryRepository implements AuthorQueryRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Author::all();
    }

    public function get(int $id)
    {
        return $this->query()->find($id);
    }

    public function getBooks(int $id)
    {
        return $this->query()->find($id)->books;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Author_QB
     */
    private function query(): \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_Author_QB
    {
        return Author::query();
    }
}
