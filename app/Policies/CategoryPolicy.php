<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Category $category): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasRole("admin");
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasRole("admin");
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasRole("admin");
    }

    public function restore(User $user, Category $category): bool
    {
        return $user->hasRole(["admin", "operator"]);
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return $user->hasRole("admin");
    }
}
