<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        //#region roles
        $admin = Role::query()->create(["name"=>"admin"]);
        $operator = Role::query()->create(["name"=>"operator"]);
        Role::query()->create(["name"=>"manual"]);
        //#endregion
        //#region permissions
        $trust_book = Permission::query()->create(["name"=>"trust book"]);
        $delivery_book = Permission::query()->create(["name"=>"delivery book"]);
        $author_page = Permission::query()->create(["name"=>"author page access"]);
        Permission::query()->create(["name"=>"create book"]);
        Permission::query()->create(["name"=>"update book"]);

        //#endregion

        $admin->givePermissionTo($trust_book);
        $operator->givePermissionTo($trust_book);
        $admin->givePermissionTo($delivery_book);
        $admin->givePermissionTo($author_page);
        $operator->givePermissionTo($author_page);

    }
}
