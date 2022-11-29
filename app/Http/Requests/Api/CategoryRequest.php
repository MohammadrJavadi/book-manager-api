<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
    private function store(): array
    {
        return [
            "title" => "required|string|min:3",
            "summary" => "nullable|string|min:30"
        ];
    }
    private function update()
    {
        return [
            "title" => "required|string|min:3",
            "summary" => "nullable|string|min:30"
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
