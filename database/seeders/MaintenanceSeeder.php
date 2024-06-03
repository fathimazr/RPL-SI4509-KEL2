<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
            "employee_id" => "teknis1",
            "trafo_id" => "1101",
            "maintenance_date" => "2023-08-03",
            "maintenance_data" => "coba fix 1"
        ]];

        foreach ($data as $d) {
            DB::table('maintenances')->insert($d);
        }
    }


}
