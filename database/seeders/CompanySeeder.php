<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Company::truncate();

        $data = [
            0 => ['Dot per Inch'],
            1 => ['EPSON'],
            2 => ['Samsung'],
            3 => ['Toshiba'],
        ];

        foreach($data as $index=>[$name]){
            Company::create([
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'System',
            ]);
        }

    }
}
