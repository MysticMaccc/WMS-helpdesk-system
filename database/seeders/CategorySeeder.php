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
            1 => ['Machine Operation'],
            2 => ['Workflow Management'],
            3 => ['Inventory Management'],
            4 => ['Production Scheduling'],
            5 => ['Safety Compliance'],
            6 => ['Product Testing'],
            7 => ['Production Reporting'],
            8 => ['Equipment Handling'],
            9 => ['Product Inspection'],
            10 => ['Testing Protocols'],
            11 => ['Non-Conformance Reporting'],
            12 => ['Calibration Services'],
            13 => ['Quality Audits'],
            14 => ['Training and Certification'],
            15 => ['Quality Documentation'],
            16 => ['Supplier Quality Management'],
            17 => ['Preventive Maintenance'],
            18 => ['Corrective Maintenance'],
            19 => ['Predictive Maintenance'],
            20 => ['Equipment Repair'],
            21 => ['Spare Parts Management'],
            22 => ['Facility Management'],
            23 => ['Utility Management'],
            24 => ['Safety Management'],
            25 => ['New Product Development'],
            26 => ['Process Innovation'],
            27 => ['Material Research'],
            28 => ['Technology Development'],
            29 => ['Innovation Management'],
            30 => ['Intellectual Property'],
            31 => ['Project Management'],
            32 => ['Collaboration and Partnerships'],
            33 => ['Transportation Management'],
            34 => ['Inventory Management'],
            35 => ['Warehouse Management'],
            36 => ['Supplier Coordination'],
            37 => ['Order Fulfillment'],
            38 => ['Return Management'],
            39 => ['Customs and Compliance'],
            40 => ['Fleet Management'],
            41 => ['Recruitment'],
            42 => ['Employee Relations'],
            43 => ['Training and Development'],
            44 => ['Compensation and Benefits'],
            45 => ['Performance Management'],
            46 => ['HR Compliance'],
            47 => ['Employee Records'],
            48 => ['Health and Safety'],
            49 => ['Market Research'],
            50 => ['Advertising'],
            51 => ['Sales Strategy'],
            52 => ['Customer Relationship Management'],
            53 => ['Product Promotion'],
            54 => ['Digital Marketing'],
            55 => ['Event Management'],
            56 => ['Sales Support'],
            57 => ['Budgeting and Planning'],
            58 => ['Financial Reporting'],
            59 => ['Accounts Payable'],
            60 => ['Accounts Receivable'],
            61 => ['Tax Management'],
            62 => ['Payroll Management'],
            63 => ['Financial Compliance'],
            64 => ['Investment Management'],
        ];

        foreach ($data as $index => [$name]) {
            Category::create([
                'hash' => encrypt($index),
                'name' => $name,
                'modified_by' => 'system'
            ]);
        }
    }
}
