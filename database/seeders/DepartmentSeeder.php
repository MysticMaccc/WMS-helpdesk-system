<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Department::truncate();

        $data = [
            1 => ['Production Department'],
            2 => ['Quality Control Department'],
            3 => ['Maintenance Department'],
            4 => ['Research and Development Department'],
            5 => ['Logistics Department'],
            6 => ['Human Resources Department'],
            7 => ['Sales and Marketing Department'],
            8 => ['Finance Department'],
        ];

        foreach ($data as $index => [$name]) {
            Department::create([
                'user_id' => 1,
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'system'
            ]);
        }
    }
}
