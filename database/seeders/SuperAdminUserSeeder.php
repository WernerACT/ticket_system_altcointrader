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
                'email'             => 'frik@altcointrader.co.za',
                'user_reference'    => 1946583,
                'department_id'     => 7
            ],
            [
                'name'              => 'RVG',
                'email'             => 'rvg@altcointrader.co.za',
                'user_reference'    => 271914981,
                'department_id'     => 7
            ],
        ];

        foreach ($superAdmins as $superAdmin) {
            $user = User::create([
                'name' => $superAdmin['name'],
                'email' => $superAdmin['email'],
                'user_reference' => $superAdmin['user_reference'],
                'department_id' => $superAdmin['department_id'],
                'site_access_key' => Str::random(12),
                'role_id' => 1,
                'password' => bcrypt(Str::random(8)),
            ]);
        }
    }
}
