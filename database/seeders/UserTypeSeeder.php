<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UserType::truncate();

        $data = [
            1 => ['System Administrator'],
            2 => ['User'],
        ];

        foreach ($data as $index => [$name]) {
            UserType::create([
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'System',
            ]);
        }
    }
}
