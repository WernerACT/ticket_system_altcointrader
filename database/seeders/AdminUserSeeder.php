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
                'name'              => 'Amanda',
                'email'             => 'amanda@altcointrader.co.za',
                'department_id'     => 3
            ],
            [
                'name'              => 'Pieter',
                'email'             => 'pieter@altcointrader.co.za',
                'department_id'     => 4
            ],
            [
                'name'              => 'Victor',
                'email'             => 'victor@altcointrader.co.za',
                'department_id'     => 6
            ],
            [
                'name'              => 'Samantha',
                'email'             => 'samantha@altcointrader.co.za',
                'department_id'     => 2
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
