<?php

namespace App\Repositories\Interfaces\User;

interface UserQueryRepositoryInterface
{
    public function get(int $id);

    public function getByToken(string $token);

    public function getByPhone(string $phone);
}
