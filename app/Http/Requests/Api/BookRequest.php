<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        return true;
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
            "author" => "required|int",
            "category" => "required|int",
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
            "code" => "required|min:5|unique:books",
            "shelf_number" => "required|min:3",
            "author" => "required",
            "category" => "required",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => __("message.errors.validation"),
            'data'      => $validator->errors()
        ]));
    }
}
