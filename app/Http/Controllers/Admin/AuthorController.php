<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AuthorDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(AuthorDataTable $dataTable)
    {
        return $dataTable->render("admin.authors.index");
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
    }
}
