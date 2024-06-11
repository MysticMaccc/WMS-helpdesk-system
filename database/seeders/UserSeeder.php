<?php

namespace Database\Seeders;

use App\Models\Company;
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
        
        //it super admin
        User::create([
            'hash' => encrypt(1),
            'department_id' => Department::pluck('id')->random(),
            'company_id' => 1,
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

        for ($x = 2; $x <= 10; $x++) {
            User::create([
                'hash' => encrypt($x),
                'company_id' => Company::pluck('id')->random(),
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
