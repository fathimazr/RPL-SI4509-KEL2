<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrafoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data trafo dengan format tanggal dd-mm-yyyy
        $data = [
            [
                'trafo_id' => '1101',
                'brand' => 'STARLITE',
                'city' => 'BANDUNG',
                'phase' => '1',
                'latitude' => -7.1384470,
                'longitude' => 107.4812439,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 1 
            ],[
                'trafo_id' => '1102',
                'brand' => 'SCHNEIDER ELECTRIC',
                'city' => 'BANDUNG',
                'phase' => '3',
                'latitude' => -6.9982514,
                'longitude' => 107.4945808,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 2 
            ],[
                'trafo_id' => '1103',
                'brand' => 'TRAFINDO',
                'city' => 'BANDUNG',
                'phase' => '1',
                'latitude' => -7.0773577,
                'longitude' => 107.5866264,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 1 
            ],[
                'trafo_id' => '1104',
                'brand' => 'CENTRADO',
                'city' => 'BANDUNG',
                'phase' => '1',
                'latitude' => -7.0924224,
                'longitude' => 107.5839274,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 1 
            ],[
                'trafo_id' => '1105',
                'brand' => 'UNINDO',
                'city' => 'BANDUNG',
                'phase' => '1',
                'latitude' => -7.1210729,
                'longitude' => 107.5817180,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 1 
            ]
        ];

        // Masukkan data trafo ke dalam database
        foreach ($data as $trafoData) {
            // Ubah format tanggal ke dalam format yang sesuai dengan database
            $trafoData['installation_date'] = Carbon::createFromFormat('d-m-Y', $trafoData['installation_date'])->format('Y-m-d');

            // Simpan data trafo ke dalam tabel 'trafos' menggunakan Query Builder
            DB::table('trafos')->insert($trafoData);
        }
    }
}
