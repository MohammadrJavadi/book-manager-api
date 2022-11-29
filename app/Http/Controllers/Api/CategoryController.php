<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        return new CategoryResource($this->query->get($id));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
