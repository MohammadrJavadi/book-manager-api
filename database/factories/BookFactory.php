<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            "title"=>$this->faker->title,
            "summary"=>$this->faker->text(100),
            "image"=>$this->faker->image,
            "shelf_number"=>$this->faker->word.$this->faker->numberBetween(100,200),
            "code"=>$this->faker->unique()->title(),
            "category_id"=>$this->faker->randomDigit(),
            "author_id"=>$this->faker->randomDigit()
        ];
    }
}
