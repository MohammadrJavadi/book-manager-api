<?php

namespace App\Repositories\Interfaces\Book;

interface BookQueryRepositoryInterface
{
    public function all();

    public function get(int $id, bool $fail=false);

    public function whereTitle(string $title);

    public function getTitle(int $id, bool $fail=false);
}
