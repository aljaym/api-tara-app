<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Adventure Guide',
                'email' => 'guide@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria.santos@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jake Rodriguez',
                'email' => 'jake.rodriguez@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Ana Cruz',
                'email' => 'ana.cruz@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Carlos Mendez',
                'email' => 'carlos.mendez@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Miguel Torres',
                'email' => 'miguel.torres@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Lisa Chen',
                'email' => 'lisa.chen@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'David Park',
                'email' => 'david.park@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Elena Rodriguez',
                'email' => 'elena.rodriguez@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
            // Add more users for better feed diversity
            [
                'name' => 'Travel Blogger',
                'email' => 'blogger@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Mountain Climber',
                'email' => 'climber@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Beach Lover',
                'email' => 'beach@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Food Explorer',
                'email' => 'foodie@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Photography Pro',
                'email' => 'photo@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Culture Enthusiast',
                'email' => 'culture@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Island Hopper',
                'email' => 'island@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Nature Lover',
                'email' => 'nature@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'City Explorer',
                'email' => 'city@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Adventure Seeker',
                'email' => 'adventure@tara.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
