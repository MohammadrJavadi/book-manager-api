<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        if (config("app.env") !== "production"){
            Book::factory(10)->create();
        }
    }
}
