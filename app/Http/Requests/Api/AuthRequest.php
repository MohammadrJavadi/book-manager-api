<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name"=>"required|min:3",
            "family"=>"required|min:3",
            "gender"=>"required|string|min:3|max:5",
            "phone"=>"required|numeric|digits_between:10,11",
            "password"=>"required|min:8",
            "email"=>"nullable|email",
            "age"=>"nullable|numeric"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
