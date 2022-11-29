<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Author */
class AuthorResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'family' => $this->family,
            'age' => $this->age,
            'gender' => $this->gender,
            'updated_at' => $this->updated_at,
            'books'=>new BookFilterCollection($this->books)
        ];
    }
}
