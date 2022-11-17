<?php

namespace App\Http\Requests\Admin;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "title"=>"required|string|min:15",
            "summary"=>"nullable|string|min:50",
            "image"=>"required|file|mimes:jpg",
            "code"=>"required|min:5|unique:books",
            "shelf_number"=>"required|min:3"
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->can("create", Book::class);
    }
}
