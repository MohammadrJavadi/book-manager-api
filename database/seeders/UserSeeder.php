<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin_user = User::query()->create([
            "name"=>"Robin",
            "family"=>"Mcclure",
            "password"=>Hash::make("015049115888"),
            "phone"=>"015049115888",
            "gender"=>"man"
        ]);
        $admin_user->assignRole("admin");

        if (config("app.env") !== "production"){
            User::factory(10)->create();
        }
    }
}
