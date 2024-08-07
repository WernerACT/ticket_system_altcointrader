<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AgentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agentUsers = [
            [
                'name'              => 'Karabo',
                'email'             => 'karabo@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Geraldine',
                'email'             => 'geraldine@altcointrader.co.za',
                'department_id'     => 4
            ],
            [
                'name'              => 'Charlotte',
                'email'             => 'charlotte@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Tshidi',
                'email'             => 'tshidi@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Monique',
                'email'             => 'monique@altcointrader.co.za',
                'department_id'     => 4
            ],
            [
                'name'              => 'Lyn-Mare',
                'email'             => 'lynmare@altcointrader.co.za',
                'department_id'     => 4
            ],
            [
                'name'              => 'Shaun',
                'email'             => 'shaun@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Veronica',
                'email'             => 'veronica@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Marcia',
                'email'             => 'marcia@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Jenna',
                'email'             => 'jenna.t@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Patricia',
                'email'             => 'patricia@altcointrader.co.za',
                'department_id'     => 3
            ],
            [
                'name'              => 'Chantelle',
                'email'             => 'chantelle@altcointrader.co.za',
                'department_id'     => 5
            ],
            [
                'name'              => 'Siphilile',
                'email'             => 'siphilile@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Lerato',
                'email'             => 'lerato@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Shelia',
                'email'             => 'shelia@altcointrader.co.za',
                'department_id'     => 1
            ],
        ];

        foreach ($agentUsers as $agentUser) {
            User::create([
                'name' => $agentUser['name'],
                'email' => $agentUser['email'],
                'role_id' => 3,
                'department_id' => $agentUser['department_id'],
                'password' => bcrypt(Str::random(8)),
            ]);
        }
    }
}
