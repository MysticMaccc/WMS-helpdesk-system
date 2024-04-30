<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();

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

        foreach($data as $index=>[$name]){
            Category::create([
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'system'
            ]);
        }
    }
}
