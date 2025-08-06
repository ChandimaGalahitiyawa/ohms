<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User; // <--- Important user model 
use Illuminate\Support\Facades\Hash; // <--- Important hash class
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Member',
            'email' => 'member@example.com',
            'password' => Hash::make('member@321'),
        ]);

        // Assign role to above user
        $admin->assignRole('member');
}
}
