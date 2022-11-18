<?php

namespace App\Services;

use Illuminate\Http\Request;

class UploadImageService
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getFileName(string $requestName)
    {
        return $this->request->file($requestName)->getClientOriginalName();
    }

    public function store(string $requestName, string $path="images")
    {
        return $this->request->file($requestName)->store($path);
    }
}
