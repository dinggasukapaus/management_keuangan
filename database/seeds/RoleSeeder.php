<?php

use Illuminate\Database\Seeder;
// ! import model
use Spatie\Permission\Models\Role;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //? membuat role user
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);


        //? membuat role user
        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
    }
}
