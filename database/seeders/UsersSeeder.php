<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin 1',
                'email' => 'user1@email.com',
                'employee_id' => 'admin1',
                'role' => 'admin',
                'branch_office' => 'Branch Office 1',
                'password' => Hash::make('admin1pass')
            ],
            // Manager
            [
                'name' => 'Manager 1',
                'email' => 'manager1@email.com',
                'employee_id' => 'manager1',
                'role' => 'manager',
                'branch_office' => 'Branch Office 1',
                'password' => Hash::make('manager1pass')
            ],
            // Teknis
            [
                'name' => 'Teknis 1',
                'email' => 'teknis1@email.com',
                'employee_id' => 'teknis1',
                'role' => 'tim_teknis',
                'branch_office' => 'Branch Office 2',
                'password' => Hash::make('teknis1pass')
            ],
        ]);
    }
}
