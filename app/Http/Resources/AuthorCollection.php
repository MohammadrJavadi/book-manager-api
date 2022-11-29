<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Author */
class AuthorCollection extends ResourceCollection
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
                    'name'=>$item->name,
                    'family'=>$item->family,
                    'gender'=>$item->gender,
                    'age'=>$item->age,
                    'books'=>new BookFilterCollection($item->books)
                ];
            }),
            'count'=>$this->count()
        ];
    }
}
