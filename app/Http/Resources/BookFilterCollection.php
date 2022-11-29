<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Book */
class BookFilterCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->count() !== 0 ? $this->collection->map(function ($item) {
            return [
                "title" => $item->title,
                "summary" => $item->summary,
                "image" => \Storage::url($item->image),
                "code" => $item->code,
                "shelf_number" => $item->shelf_number,
            ];
        }) : [];
    }
}
