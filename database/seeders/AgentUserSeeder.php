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
                'name'              => 'Samantha',
                'email'             => 'samantha@altcointrader.co.za',
                'department_id'     => 1
            ],

            [
                'name'              => 'Karabo',
                'email'             => 'karabo@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Jeff',
                'email'             => 'jeff@altcointrader.co.za',
                'department_id'     => 1
            ],
            [
                'name'              => 'Geraldine',
                'email'             => 'geraldine@altcointrader.co.za',
                'department_id'     => 1
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
                'name'              => 'Montana',
                'email'             => 'montana@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Talita',
                'email'             => 'talita@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Thabiso',
                'email'             => 'thabiso@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Veronica',
                'email'             => 'veronica@altcointrader.co.za',
                'department_id'     => 2
            ],
            [
                'name'              => 'Basetsana',
                'email'             => 'basetsana@altcointrader.co.za',
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
