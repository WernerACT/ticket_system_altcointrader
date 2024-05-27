<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


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
                'department_id'     => 1
            ],
            [
                'name'              => 'Piet',
                'email'             => 'piet@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Amanda',
                'email'             => 'amanda@altcointrader.co.za',
                'department_id'     => 3
            ],
            [
                'name'              => 'Adam',
                'email'             => 'adam@altcointrader.co.za',
                'department_id'     => 7
            ],
            [
                'name'              => 'Pieter',
                'email'             => 'pieter@altcointrader.co.za',
                'department_id'     => 4
            ],
        ];

        foreach ($adminUsers as $adminUser) {
            User::create([
                'name' => $adminUser['name'],
                'email' => $adminUser['email'],
                'role_id' => 2,
                'department_id' => $adminUser['department_id'],
                'password' => bcrypt(Str::random(8)),
            ]);
        }
    }
}
