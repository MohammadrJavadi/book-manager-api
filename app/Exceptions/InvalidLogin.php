<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvalidLogin extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request)
    {
        return response()->json([
            "status"=>Response::HTTP_UNAUTHORIZED,
            "message"=>"No access error!",
        ], Response::HTTP_UNAUTHORIZED);
    }
}
