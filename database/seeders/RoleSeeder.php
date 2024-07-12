<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();

        $data = [
            1 => ['Dashboard'],
            2 => ['Request Module'],
            3 => ['Request Maintenance Module'],
            4 => ['Category Maintenance (Request Maintenance Module)'],
            5 => ['Request Type Maintenance (Request Maintenance Module)'],
            6 => ['Request Type Status Maintenance (Request Maintenance Module)'],
            7 => ['User Management Module'],
            8 => ['Position Maintenance (User Management Module)'],
            9 => ['Department Maintenance (User Management Module)'],
            10 => ['User Maintenance (User Management Module)'],
        ];

        foreach ($data as $index => [$name]) {
            Role::create([
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'system',
            ]);
        }
    }
}
