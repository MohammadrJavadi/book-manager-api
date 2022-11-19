<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Author $author): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Author $author): bool
    {
    }

    public function delete(User $user, Author $author): bool
    {
    }

    public function restore(User $user, Author $author): bool
    {
    }

    public function forceDelete(User $user, Author $author): bool
    {
    }
}
