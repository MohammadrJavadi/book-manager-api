<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookQueryRepositoryInterface $query;
    private BookCommandRepositoryInterface $command;
    private UploadImageService $service;

    public function __construct(BookQueryRepositoryInterface $query, BookCommandRepositoryInterface $command, UploadImageService $service)
    {
        $this->query = $query;
        $this->command = $command;
        $this->service = $service;
    }

    public function index()
    {
        $books = $this->query->all();
        return new BookCollection($books);
    }

    public function store(BookRequest $request)
    {
        $filePath = $this->service->store("image");
        $book = $this->command->create(["image" => $filePath] + $request->validated() + ["author_id" => $request->input("author"), "category_id" => $request->input("category")]);
        return $this->success(trans("message.created", ["resource" => "book"]), $book);
    }

    public function show($id)
    {
        $book = $this->query->get($id);
        return new BookResource($book);
    }

    public function update($id, BookRequest $request)
    {
        $book = $this->command->update($id, $request->validated()+["category_id"=>$request->input("category"),"author_id"=>$request->input("author")]);
        return $this->success(trans("message.updated", ["resource" => "book"]), $book);
    }

    public function destroy($id)
    {
    }
}
