<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Administrator'],
            ['name' => 'Administrator'],
            ['name' => 'Agent'],
            ['name' => 'User'],
        ];

        DB::table('roles')->insert($roles);
    }
}
