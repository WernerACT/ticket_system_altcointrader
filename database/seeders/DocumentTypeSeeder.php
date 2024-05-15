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
                ];

                DB::table('document_types')->insert($types);
    }
}
