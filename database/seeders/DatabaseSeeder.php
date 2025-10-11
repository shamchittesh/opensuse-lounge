<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\MemberSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->membership()->create([
            'name' => 'Membership Admin',
            'email' => 'membership@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->election()->create([
            'name' => 'Election User',
            'email' => 'election@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->allRoles()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        Member::factory()->count(1000)->active()->create();
        Member::factory()->count(70)->emeritus()->create();
    }
}
