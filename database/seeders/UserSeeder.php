<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();

        $data = [
            1 => ['Production Run'],
            2 => ['Equipment Maintenance'],
            3 => ['Production Schedule Change'],
            4 => ['Supply Chain Department'],
            5 => ['Quality Inspection'],
            6 => ['Non-Conformance Report'],
            7 => ['Quality Audit Request'],
            8 => ['Equipment Design'],
            9 => ['Process Improvement'],
            10 => ['Engineering Change'],
            11 => ['Material Requisition'],
            12 => ['Supplier Evaluation'],
            13 => ['Supply Chain Disruption'],
            14 => ['Recruitment'],
            15 => ['Training'],
            16 => ['Employee Relations'],
        ];

        //it super admin
        User::create([
            'hash' => encrypt(1),
            'department_id' => Department::pluck('id')->random(),
            'firstname' => 'System',
            'middlename' => 'Development',
            'lastname' => 'Team',
            'suffix' => '',
            'name' => 'SysDevTeam',
            'email' => 'sherwin.roxas@neti.com.ph',
            'password' => Hash::make('password'),
            'modified_by' => 'system'
        ]);
        // it super admin end

        for ($x = 2; $x <= 35; $x++) {
            User::create([
                'hash' => encrypt($x),
                'department_id' => Department::pluck('id')->random(),
                'firstname' => fake()->unique()->word,
                'middlename' => fake()->unique()->word,
                'lastname' => fake()->unique()->word,
                'suffix' => fake()->unique()->word,
                'name' => fake()->unique()->word,
                'email' => fake()->email(),
                'password' => Hash::make('password'),
                'modified_by' => 'system'
            ]);
        }
    }
}
