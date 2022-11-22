<?php

namespace App\Repositories\Interfaces\Author;

interface AuthorCommandRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
