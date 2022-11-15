<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            "name"=>"Robin",
            "family"=>"Mcclure",
            "password"=>Hash::make("015049115888"),
            "phone"=>"015049115888",
            "gender"=>"man"
        ]);

        if (config("app.env") !== "production"){
            User::factory(10)->create();
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
