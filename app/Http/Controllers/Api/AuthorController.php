<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorCollection;
use App\Models\Author;
use App\Repositories\Interfaces\Author\AuthorCommandRepositoryInterface;
use App\Repositories\Interfaces\Author\AuthorQueryRepositoryInterface;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private AuthorCommandRepositoryInterface $command;
    private AuthorQueryRepositoryInterface $query;

    public function __construct(AuthorCommandRepositoryInterface $command, AuthorQueryRepositoryInterface $query)
    {
        $this->command = $command;
        $this->query = $query;
    }

    public function index()
    {
        return new AuthorCollection($this->query->all());
    }

    public function store(Request $request)
    {
    }

    public function show(Author $author)
    {
    }

    public function update(Request $request, Author $author)
    {
    }

    public function destroy(Author $author)
    {
    }
}
