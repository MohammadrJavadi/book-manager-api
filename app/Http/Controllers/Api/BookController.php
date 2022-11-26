<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookQueryRepositoryInterface $query;
    private BookCommandRepositoryInterface $command;

    public function __construct(BookQueryRepositoryInterface $query, BookCommandRepositoryInterface $command)
    {
        $this->query = $query;
        $this->command = $command;
    }

    public function index()
    {
        $books = $this->query->all();
        return new BookCollection($books);
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $book = $this->query->get($id);
        return new BookResource($book);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
