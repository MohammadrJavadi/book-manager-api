<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Book */
class BookResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'image' => \Storage::url($this->image),
            'shelf_number' => $this->shelf_number,
            'code' => $this->code,
            'updated_at' => $this->updated_at,

            'category' => $this->category,
            'author' => $this->author,
        ];
    }
}
