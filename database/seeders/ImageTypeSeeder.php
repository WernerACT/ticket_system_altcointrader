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
            ['name' => 'Unknown'],
            ['name' => 'ID Copy'],
            ['name' => 'Passport Copy'],
            ['name' => 'Selfie'],
            ['name' => '2FA Removal Request'],
            ['name' => 'Spam'],
        ];

        DB::table('image_types')->insert($imageTypes);
    }
}
