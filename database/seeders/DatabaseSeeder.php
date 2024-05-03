<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $faker = Faker::create();

        DB::table('users')->insert([
            'department_id' => $faker->numberBetween(1, 10), // Assuming departments have IDs from 1 to 10
            'position_id' => $faker->numberBetween(1, 5), // Assuming positions have IDs from 1 to 5
            'user_type_id' => $faker->numberBetween(1, 3), // Assuming user types have IDs from 1 to 3
            'hash' => Str::random(10),
            'firstname' => $faker->firstName,
            'middlename' => $faker->lastName,
            'lastname' => $faker->lastName,
            'suffix' => $faker->suffix,
            'is_active' => $faker->boolean(90), // 90% chance of being active
            'modified_by' => $faker->name,
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(10)), // Generate a random password
            'remember_token' => Str::random(10),
            'current_team_id' => null, // You can set this to an appropriate team ID if needed
            'profile_photo_path' => null, // You can set a path to a default profile photo if needed
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
