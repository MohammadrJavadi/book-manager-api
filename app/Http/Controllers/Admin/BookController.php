<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Repositories\Interfaces\Author\AuthorQueryRepositoryInterface;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use App\Repositories\Interfaces\Category\CategoryQueryRepositoryInterface;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookCommandRepositoryInterface $command;
    private UploadImageService $service;
    private BookQueryRepositoryInterface $query;

    public function __construct(BookQueryRepositoryInterface $query, BookCommandRepositoryInterface $command, UploadImageService $service)
    {
        $this->command = $command;
        $this->service = $service;
        $this->query = $query;
    }

    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render("admin.books.index");
    }

    public function create(AuthorQueryRepositoryInterface $author, CategoryQueryRepositoryInterface $category)
    {
        return view("admin.books.create", ["authors"=>$author->all(), "categories"=>$category->all()]);
    }

    public function store(BookRequest $request)
    {
        $filePath = $this->service->store("image");
        $this->command->create($request->only(["title", "code", "shelf_number", "summary"]) + ["image"=>$filePath, "author_id"=>$request->input("author"), "category_id"=>$request->input("category")]);
        return $this->backWithMessage("success", trans("message.created", ["resource" => "book"]));
    }

    public function show($id)
    {
        return view("admin.books.show", ["book"=>$this->query->get($id, true)]);
    }

    public function edit($id, AuthorQueryRepositoryInterface $author, CategoryQueryRepositoryInterface $category)
    {
        return view("admin.books.edit", [
            "book"=>$this->query->get($id, true),
            "authors"=>$author->all(),
            "categories"=>$category->all()
        ]);
    }

    public function update(BookRequest $request, $id)
    {
        $filePath=$this->service->store("image");
        $image = $filePath?["image"=>$filePath]:[];
        $extra = ["author_id" => $request->input("author"), "category_id" => $request->input("category")];
        $this->command->update($id, $request->only(["title", "code", "shelf_number", "summary"])+ $extra +$image);
        return $this->redirectRouteWithMessage("books.index", "success", trans("message.updated", ["resource" => "book"]));
    }

    public function destroy($id)
    {
        return $this->command->delete($id);
    }
}
