<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageTypes = [
            ['name' => 'Selfie'],
            ['name' => 'ID Copy'],
            ['name' => 'Passport Copy'],
            ['name' => 'Spam'],
        ];

        DB::table('image_types')->insert($imageTypes);
    }
}
