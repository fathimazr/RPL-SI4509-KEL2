<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DataEntry;

class DataEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define default data
        $defaultData = [
            [
                'type' => 'brand',
                'value' => 'STARLITE',
            ],
            [
                'type' => 'city',
                'value' => 'BANDUNG',
            ],
            [
                'type' => 'category',
                'value' => 'Step Up Transformator',
            ],
            [
                'type' => 'branch_office',
                'value' => 'Branch Office 1',
            ],
            [
                'type' => 'brand',
                'value' => 'SCHNEIDER ELECTRIC',
            ],
            [
                'type' => 'city',
                'value' => 'JAKARTA',
            ],
            [
                'type' => 'category',
                'value' => 'Step Down Transformator',
            ],
            [
                'type' => 'branch_office',
                'value' => 'Branch Office 2',
            ],
            [
                'type' => 'brand',
                'value' => 'CENTRADO',
            ],
            [
                'type' => 'category',
                'value' => 'Isolation Transformator',
            ],
            [
                'type' => 'branch_office',
                'value' => 'Branch Office 3',
            ],
            [
                'type' => 'brand',
                'value' => 'UNINDO',
            ],
            [
                'type' => 'category',
                'value' => 'Auto Transformator',
            ],
            [
                'type' => 'branch_office',
                'value' => 'Branch Office 4',
            ],
            [
                'type' => 'brand',
                'value' => 'TRAFFINDO',
            ],
            [
                'type' => 'branch_office',
                'value' => 'Branch Office 5',
            ],
        ];

        // Insert default data into the database
        foreach ($defaultData as $data) {
            DB::table('data_entries')->insert($data);        }
    }
}