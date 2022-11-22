<?php

namespace App\Repositories\Interfaces\Author;

interface AuthorQueryRepositoryInterface
{
    public function all();

    public function get(int $id);

    public function getBooks(int $id);
}
