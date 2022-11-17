<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Book $book): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasRole("admin") || $user->can("create book");
    }

    public function update(User $user, Book $book): bool
    {
        return $user->hasRole("admin") || $user->can("update book");
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->hasRole("admin");
    }

    public function restore(User $user, Book $book): bool
    {
        return $user->hasRole("admin");
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return $user->hasRole("admin");
    }
}
