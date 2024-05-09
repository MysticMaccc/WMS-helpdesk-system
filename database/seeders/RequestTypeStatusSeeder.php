<?php

namespace Database\Seeders;

use App\Models\RequestTypeStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestTypeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            1 => 'Review Request',
            2 => 'Approve Submitted Request',
            3 => 'Assign Request',
            4 => 'On Progress',
            5 => 'Completed',
            6 => 'Review Completed Request',
            7 => 'Approve Completed Request',
            8=> 'Closed Request'
        ];

        foreach ($data as $index => $name) {
            RequestTypeStatus::create([
                'hash'=> encrypt($index),
                'name'=> $name,
                'modified_by' => 'system',
            ]);
        }
    }
}
