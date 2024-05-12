<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class); // <--- Important role seeder
        $this->call(AdminSeeder::class); // <--- Important admin seeder
        $this->call(MemberSeeder::class); // <--- Important member seeder
        $this->call(SpecializationSeeder::class); // <--- Important specialization seeder
    }
}
