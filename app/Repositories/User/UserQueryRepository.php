<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Interfaces\User\UserQueryRepositoryInterface;

class UserQueryRepository implements UserQueryRepositoryInterface
{
    public function __construct()
    {
        //
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_User_QB
     */
    public function query(): \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_User_QB
    {
        return User::query();
    }

    public function get(int $id)
    {
        return $this->query()->find($id);
    }

    public function getByToken(string $token)
    {
    }

    public function getByPhone(string $phone)
    {
        return $this->query()->where("phone", $phone)->firstOrFail();
    }
}
