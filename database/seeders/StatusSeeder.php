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
                ['name' => 'Awaiting Client Response'],
                ['name' => '24 Hour Pre Closed'],
                ['name' => 'Closed'],
                ['name' => 'Spam'],
                ['name' => 'Waiting for Client Response'],
                ['name' => 'Client Response Received'],
            ];

            DB::table('statuses')->insert($statuses);
        }
    }
}
