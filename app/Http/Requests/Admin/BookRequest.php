<?php

namespace App\Http\Requests\Admin;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        switch (request()->method()) {
            case "POST":
                return $this->store();
            case "PUT" || "PATCH":
                return $this->update();
        }
    }

    public function authorize(): bool
    {
        return auth()->user()->can("create", Book::class);
    }

    /**
     * @return string[]
     */
    public function store(): array
    {
        return [
            "title" => "required|string|min:15",
            "summary" => "nullable|string|min:50",
            "image" => "required|image|mimes:jpg",
            "code" => "required|min:5|unique:books",
            "shelf_number" => "required|min:3",
            "author"=>"required",
            "category"=>"required",
        ];
    }

    /**
     * @return string[]
     */
    public function update(): array
    {
        return [
            "title" => "required|string|min:15",
            "summary" => "nullable|string|min:50",
            "image" => "image|mimes:jpg",
            "code" => "required|min:5|unique:books",
            "shelf_number" => "required|min:3",
            "author"=>"required",
            "category"=>"required",
        ];
    }
}
