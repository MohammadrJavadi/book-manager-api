<?php

namespace App\Repositories\Interfaces\User;

interface UserCommandRepositoryInterface
{
    public function create(array $data, string $role="manual");

    public function update(int $id, array $data);

    public function delete(int $id);
}
