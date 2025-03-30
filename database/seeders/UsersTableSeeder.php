<?php
// database/seeders/UsersTableSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),  // Hash the password using Hash facade
            'role' => 'admin',  // Assign 'admin' role directly
        ]);

        // Membuat User biasa
        $user = User::create([
            'name' => 'Pengguna',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),  // Hash the password using Hash facade
            'role' => 'pengguna',  // Assign 'pengguna' role directly
        ]);
    }
}
