<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookApiTest extends TestCase
{
    //#region index
    public function test_index()
    {
        $response = $this->get('/api/v1/books');

        $response->assertStatus(200);
    }

    public function test_index_response()
    {
        $response = $this->get('/api/v1/books');
        $response->assertJson([
            "data"=>true,
            "count"=>true
        ]);
    }
    //#endregion
    //#region show
    public function test_show()
    {
        $response = $this->get();
//        echo route("api.books.show", 5);
//        $response->dd();
//        $response->assertStatus(200);
    }
    public function test_show_response()
    {
        $response = $this->get('/api/v1/books/5');
        $response->assertJson([
            "data"=>true
        ]);
    }
    //#endregion
}
