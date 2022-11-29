<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        $gender = $this->faker->randomElement(["man", "woman"]);
        return [
            "name"=>$this->faker->firstName($gender),
            "family"=>$this->faker->lastName(),
            "age"=>$this->faker->numberBetween(20,80),
            "gender"=>$gender
        ];
    }
}
