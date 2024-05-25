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
                'user_reference'    => 279126207,
                'department_id'     => 1
            ],

            [
                'name'              => 'Karabo',
                'email'             => 'karabo@altcointrader.co.za',
                'user_reference'    => 271823488,
                'department_id'     => 1
            ],
            [
                'name'              => 'Jeff',
                'email'             => 'jeff@altcointrader.co.za',
                'user_reference'    => 1946584,
                'department_id'     => 1
            ],
            [
                'name'              => 'Geraldine',
                'email'             => 'geraldine@altcointrader.co.za',
                'user_reference'    => 289152957,
                'department_id'     => 1
            ],
            [
                'name'              => 'Charlotte',
                'email'             => 'charlotte@altcointrader.co.za',
                'user_reference'    => 275456650,
                'department_id'     => 1
            ],
            [
                'name'              => 'Tshidi',
                'email'             => 'tshidi@altcointrader.co.za',
                'user_reference'    => 280430503,
                'department_id'     => 1
            ],
            [
                'name'              => 'Monique',
                'email'             => 'monique@altcointrader.co.za',
                'user_reference'    => 261017145,
                'department_id'     => 4
            ],
            [
                'name'              => 'Lyn-Mare',
                'email'             => 'lynmare@altcointrader.co.za',
                'user_reference'    => 276708639,
                'department_id'     => 4
            ],
            [
                'name'              => 'Shaun',
                'email'             => 'shaun@altcointrader.co.za',
                'user_reference'    => 272061813,
                'department_id'     => 2
            ],
            [
                'name'              => 'Montana',
                'email'             => 'montana@altcointrader.co.za',
                'user_reference'    => 274852986,
                'department_id'     => 2
            ],
            [
                'name'              => 'Talita',
                'email'             => 'talita@altcointrader.co.za',
                'user_reference'    => 287149285,
                'department_id'     => 2
            ],
            [
                'name'              => 'Thabiso',
                'email'             => 'thabiso@altcointrader.co.za',
                'user_reference'    => 279947741,
                'department_id'     => 2
            ],
            [
                'name'              => 'Veronica',
                'email'             => 'veronica@altcointrader.co.za',
                'user_reference'    => 274252239,
                'department_id'     => 2
            ],
            [
                'name'              => 'Basetsana',
                'email'             => 'basetsana@altcointrader.co.za',
                'user_reference'    => 275422421,
                'department_id'     => 2
            ],
            [
                'name'              => 'Patricia',
                'email'             => 'patricia@altcointrader.co.za',
                'user_reference'    => 272057251,
                'department_id'     => 3
            ],
            [
                'name'              => 'Chantelle',
                'email'             => 'chantelle@altcointrader.co.za',
                'user_reference'    => 271950386,
                'department_id'     => 5
            ],
        ];

        foreach ($agentUsers as $agentUser) {
            $user = User::create([
                'name' => $agentUser['name'],
                'email' => $agentUser['email'],
                'user_reference' => $agentUser['user_reference'],
                'role_id' => 3,
                'department_id' => $agentUser['department_id'],
                'site_access_key'   => Str::random(12),
                'password' => bcrypt(Str::random(8)),
            ]);
        }
    }
}
