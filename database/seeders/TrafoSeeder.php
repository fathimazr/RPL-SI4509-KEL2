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
                'city' => 'JAKARTA',
                'phase' => '1',
                'latitude' => 1.043496628353671,
                'longitude' => 107.38636884737015,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 1 
            ],[
                'trafo_id' => '1102',
                'brand' => 'STARBOY',
                'city' => 'BANDUNG',
                'phase' => '3',
                'latitude' => 1.043496628353671,
                'longitude' => 107.38636884737015,
                'capacity' => 200,
                'installation_date' => '3-8-2023',
                // 'user_id' => 2 
            ],[
                'trafo_id' => '1103',
                'brand' => 'STARLITE',
                'city' => 'JAKARTA',
                'phase' => '1',
                'latitude' => 1.043496628353671,
                'longitude' => 107.38636884737015,
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
