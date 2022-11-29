<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorRequest;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
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

    public function store(AuthorRequest $request)
    {
        $author = $this->command->create($request->validated());
        return $this->success(trans("message.created", ["resource" => "author"]), $author);
    }

    public function show($author)
    {
        return new AuthorResource($this->query->get($author));
    }

    public function update(Request $request, $author)
    {
    }

    public function destroy($author)
    {
    }
}
