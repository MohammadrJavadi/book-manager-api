<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Repositories\Interfaces\Category\CategoryCommandRepositoryInterface;
use App\Repositories\Interfaces\Category\CategoryQueryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryCommandRepositoryInterface $command;
    private CategoryQueryRepositoryInterface $query;

    public function __construct(CategoryCommandRepositoryInterface $command, CategoryQueryRepositoryInterface $query)
    {
        $this->command = $command;
        $this->query = $query;
    }

    public function index()
    {
        return new CategoryCollection($this->query->all());
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->command->create($request->validated());
        return $this->success(trans("message.created", ["resource" => "category"]), $category);
    }

    public function show($id)
    {
        return new CategoryResource($this->query->get($id));
    }

    public function update($id, CategoryRequest $request)
    {
        $category = $this->command->update($id, $request->validated());
        return $this->success(trans("message.updated", ["resource" => "category"]), $category);
    }

    public function destroy($id)
    {
        $res = $this->command->delete($id);
        return $this->success(trans("message.deleted", ["resource" => "category"]), $res);
    }
}
