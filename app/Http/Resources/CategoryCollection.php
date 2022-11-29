<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Category */
class CategoryCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item){
                return [
                    'title'=>$item->title,
                    'summary'=>$item->summary,
                    "books"=>new BookFilterCollection($item->books)
                ];
            }),
            'count'=>$this->count()
        ];
    }
}
