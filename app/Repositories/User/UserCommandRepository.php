<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Interfaces\User\UserCommandRepositoryInterface;

class UserCommandRepository implements UserCommandRepositoryInterface
{
    public function __construct()
    {
        //
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_User_QB
     */
    private function query(): \Illuminate\Database\Eloquent\Builder|\LaravelIdea\Helper\App\Models\_IH_User_QB
    {
        return User::query();
    }

    public function create(array $data, string $role="manual")
    {
        $user = $this->query()->create($data);
        $user->assignRole($role);
        return $user;
    }

    public function update(int $id, array $data)
    {
        return $this->query()->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->query()->find($id)->delete();
    }
}
