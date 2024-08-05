<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmins = [
            [
                'name'              => 'Frik',
                'email'             => 'frik.maartens@gmail.com',
                'department_id'     => 7
            ],
            [
                'name'              => 'Adam',
                'email'             => 'adam@altcointrader.co.za',
                'department_id'     => 7
            ],
            [
                'name'              => 'RVG',
                'email'             => 'rvg@altcointrader.co.za',
                'department_id'     => 7
            ],
            [
                'name'              => 'Lizal',
                'email'             => 'lizal@altcointrader.co.za',
                'department_id'     => 1
            ]

        ];

        foreach ($superAdmins as $superAdmin) {
            User::create([
                'name' => $superAdmin['name'],
                'email' => $superAdmin['email'],
                'department_id' => $superAdmin['department_id'],
                'role_id' => 1,
                'password' => bcrypt('cgmKAi82tjBQ'),
            ]);
        }
    }
}
