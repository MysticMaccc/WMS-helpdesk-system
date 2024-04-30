<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x = 1 ; $x < 10 ; $x++){
            UserRole::create([
                'user_id' => 1,
                'role_id' => $x,
                'hash' => encrypt($x),
                'modified_by' => 'system'
            ]);
        }
    }
}
