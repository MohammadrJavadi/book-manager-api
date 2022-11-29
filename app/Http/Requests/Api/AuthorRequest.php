<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthorRequest extends FormRequest
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
            "name" => "required|string|min:3",
            "family" => "required|string|min:3",
            "gender" => "required|string|min:3|max:5",
            "age" => "required|numeric|min:2"
        ];
    }
    private function update()
    {
        return [
            "name" => "required|string|min:3",
            "family" => "required|string|min:3",
            "gender" => "nullable|in:man,woman",
            "age" => "required|numeric|min:2"
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
