<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsers = [
            [
                'name'              => 'Lizal',
                'email'             => 'lizal@altcointrader.co.za',
                'user_reference'    => 238746596,
                'department_id'     => 1
            ],
            [
                'name'              => 'Piet',
                'email'             => 'piet@altcointrader.co.za',
                'user_reference'    => 278395802,
                'department_id'     => 2
            ],
            [
                'name'              => 'Amanda',
                'email'             => 'amanda@altcointrader.co.za',
                'user_reference'    => 279274699,
                'department_id'     => 3
            ],
            [
                'name'              => 'Adam',
                'email'             => 'adam@altcointrader.co.za',
                'user_reference'    => 271119877,
                'department_id'     => 7
            ],
            [
                'name'              => 'Pieter',
                'email'             => 'pieter@altcointrader.co.za',
                'user_reference'    => 292087349,
                'department_id'     => 4
            ],
        ];

        foreach ($adminUsers as $adminUser) {
            $user = User::create([
                'name' => $adminUser['name'],
                'email' => $adminUser['email'],
                'user_reference' => $adminUser['user_reference'],
                'role_id' => 2,
                'department_id' => $adminUser['department_id'],
                'site_access_key'   => Str::random(12),
                'password' => bcrypt(Str::random(8)),
            ]);




        }
    }
}
