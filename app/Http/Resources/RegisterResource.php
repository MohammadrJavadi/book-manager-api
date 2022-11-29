<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    private $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    public static $wrap = false;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "user" => [
                "name"=>$this->resource->name,
                "family"=>$this->resource->family,
                "gender"=>$this->resource->gender,
                "phone"=>$this->resource->phone,
            ],
            "token" => $this->token,
            "token_type" => "Brear"
        ];
    }
}
