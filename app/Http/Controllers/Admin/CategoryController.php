<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryCommandRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryCommandRepositoryInterface $command;

    public function __construct(CategoryCommandRepositoryInterface $command)
    {
        $this->command = $command;
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render("admin.categories.index");
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        return $this->command->delete($id);
    }
}
