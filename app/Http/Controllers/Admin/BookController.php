<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Repositories\Interfaces\Book\BookCommandRepositoryInterface;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookCommandRepositoryInterface $command;
    private UploadImageService $uploadImageService;

    public function __construct(BookCommandRepositoryInterface $command, UploadImageService $uploadImageService)
    {
        $this->command = $command;
        $this->uploadImageService = $uploadImageService;
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
        $path = $this->uploadImageService->store("image");
        $this->command->create($request->validated()+["image"=>$path, "category_id"=>15, "author_id"=>15]);
        return $this->backWithMessage("success", trans("message.created", ["resource" => "book"]));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
