<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users first
        $this->call(UserSeeder::class);

        // Seed admin user
        $this->call(AdminSeeder::class);

        // Seed follow relationships
        $this->call(FollowSeeder::class);

        // Seed events and posts
        $this->call(EventSeeder::class);
        $this->call(PostSeeder::class);
    }
}
