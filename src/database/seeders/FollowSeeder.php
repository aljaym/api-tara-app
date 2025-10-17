<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Follow;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('is_admin', false)->get();
        
        if ($users->count() < 2) {
            $this->command->error('Need at least 2 users to create follows. Please run UserSeeder first.');
            return;
        }

        // Create follow relationships
        foreach ($users as $user) {
            // Each user follows 3-5 other random users
            $followCount = rand(3, 5);
            $usersToFollow = $users->where('id', '!=', $user->id)->random($followCount);
            
            foreach ($usersToFollow as $userToFollow) {
                Follow::firstOrCreate([
                    'follower_id' => $user->id,
                    'following_id' => $userToFollow->id,
                ]);
            }
        }

        $this->command->info('Created follow relationships between users.');
    }
}
