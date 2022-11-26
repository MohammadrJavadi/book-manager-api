<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public static $wrap = false;
    private $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "status"=>"Success",
            "user" => [
                "name" => $this->resource->name,
                "family" => $this->resource->family,
                "phone" => $this->resource->phone
            ],
            "token" => $this->token,
            "token_type" => "Brear"
        ];
    }
}
