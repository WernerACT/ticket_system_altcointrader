<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
                    ['name' => 'Unknown'],
                    ['name' => 'ID Copy'],
                    ['name' => 'Passport Copy'],
                    ['name' => 'Proof of Payment'],
                    ['name' => 'Spam'],
                    ['name' => 'Proof of Address'],
                    ['name' => 'Selfie'],
                    ['name' => 'Screenshot (Missing Deposit)'],
                    ['name' => 'Screenshot (Missing Withdrawal)'],
                    ['name' => 'Screenshot (AltCoinTrader Error)'],
                ];

                DB::table('document_types')->insert($types);
    }
}
