<?php

// database/seeders/RoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Membuat role admin dan user
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'user']);
    }
}
