<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $statuses = [
                ['name' => 'New'],
                ['name' => 'Read'],
                ['name' => 'In Progress'],
                ['name' => 'Response Pending'],
                ['name' => '24 Hour Pre Closed'],
                ['name' => 'Closed'],
                ['name' => 'Spam'],
            ];

            DB::table('statuses')->insert($statuses);
        }
    }
}
