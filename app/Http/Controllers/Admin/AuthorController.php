<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AuthorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(AuthorDataTable $dataTable)
    {
        return $dataTable->render("admin.authors.index");
    }

    public function show($id)
    {
        // ToDo: Implements show action | 11/22/2022
    }

    public function destroy($id)
    {
        return Author::find($id)->delete();
    }
}
