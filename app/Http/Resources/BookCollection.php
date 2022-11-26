<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Book */
class BookCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection;
    }
    public function with($request)
    {
        return [
            "count"=>$this->collection->count()
        ];
    }
}
