<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Repositories\Interfaces\Book\BookQueryRepositoryInterface;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookCommandRepositoryInterface $command;
    private UploadImageService $uploadImageService;
    private BookQueryRepositoryInterface $query;

    public function __construct(BookQueryRepositoryInterface $query, BookCommandRepositoryInterface $command, UploadImageService $uploadImageService)
    {
        $this->command = $command;
        $this->uploadImageService = $uploadImageService;
        $this->query = $query;
    }

    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render("admin.books.index");
    }

    public function create()
    {
        return view("admin.books.create");
    }

    public function store(BookRequest $request)
    {
        $filePath = $request->file("image")->store("images");
        $book = $this->command->create($request->only(["title", "code", "shelf_number", "summary"]) + ["image"=>$filePath, "category_id"=>15, "author_id"=>14]);
        return $this->backWithMessage("success", trans("message.created", ["resource" => "book"]));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        return view("admin.books.edit", ["book"=>$this->query->get($id, true)]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
