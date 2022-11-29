<?php
namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponseMessage
{
    protected function success($message,$data, $status=200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public function failed($message, $description, $status=200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "description" => $description
        ], $status);
    }
}
