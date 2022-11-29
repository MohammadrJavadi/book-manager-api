<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;

class BookCommandRepository implements BookCommandRepositoryInterface
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

    public function restore()
    {
        // TODO: Implement restore() method.
    }

    public function forceDelete()
    {
        // TODO: Implement forceDelete() method.
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Book::query();
    }
}
