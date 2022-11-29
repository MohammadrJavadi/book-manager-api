<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;

class BookQueryRepository implements BookQueryRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Book::query();
    }

    public function all()
    {
        return Book::all();
    }

    public function get(int $id, bool $fail = false)
    {
        if ($fail)
            return $this->query()->findOrFail($id);

        return $this->query()->find($id);
    }

    public function whereTitle(string $title)
    {
        return $this->query()->where("title", "like", "%$title%")->get();
    }

    public function getTitle(int $id, bool $fail = false)
    {
        if ($fail)
            return $this->query()->findOrFail($id)->pluck("title");

        return $this->query()->find($id)->pluck("title");
    }

    public function author(int $id)
    {
        return $this->get($id)->author;
    }

    public function category(int $id)
    {
        return $this->get($id)->category;
    }
}
