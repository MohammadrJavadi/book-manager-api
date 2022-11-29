<?php

namespace App\Repositories\Interfaces\Book;

interface BookCommandRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function restore();

    public function forceDelete();
}
