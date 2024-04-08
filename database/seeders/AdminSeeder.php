<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <--- Important user model
use Spatie\Permission\Models\Role; // <--- Important permission model
use Illuminate\Support\Facades\Hash; // <--- Important hash class


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Create an admin user
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('B@b123321'),
            ]);

            // Assign 'admin' role to the admin user
            $admin->assignRole('admin');
    }
}
