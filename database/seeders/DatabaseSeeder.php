<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DepartmentSeeder::class,
            StatusSeeder::class,
            SuperAdminUserSeeder::class,
            AdminUserSeeder::class,
            AgentUserSeeder::class,
            ImageTypeSeeder::class,
            DocumentTypeSeeder::class,
            CategorySeeder::class,
            CannedResponseSeeder::class,
        ]);

        User::create([
            'name' => 'Werner Wessels',
            'email' => 'werner.w@altcointrader.co.za',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'department_id' => 1,
        ]);
    }
}
