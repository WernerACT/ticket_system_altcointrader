<?php

namespace Database\Seeders;

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
        {
            $departments = [
                ['id' => 1, 'name' => 'Support'],
                ['id' => 2, 'name' => 'FICA'],
                ['id' => 3, 'name' => 'Accounts'],
                ['id' => 4, 'name' => 'Fraud'],
                ['id' => 5, 'name' => 'Auditing'],
                ['id' => 6, 'name' => 'Technical'],
                ['id' => 7, 'name' => 'ExCo'],
            ];

            DB::table('departments')->insert($departments);
        }
    }
}
