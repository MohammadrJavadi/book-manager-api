<?php

namespace App\Repositories\Interfaces\Category;

interface CategoryCommandRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
