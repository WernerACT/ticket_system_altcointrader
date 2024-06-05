<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'              => 'Unknown',
                'department_id'     => 1,
            ],
            [
                'name'              => '2FA not working',
                'department_id'     => 1,
            ],
            [
                'name'              => '2FA Removal',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Crypto withdrawal delay',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Manually Unblock',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Auto Unblock',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Crypto withdrawal',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Provide TxID',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Open orders',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Missing crypto deposit',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Website errors',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Coin Recovery',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Resend confirmation Link',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Withdrawal cancellation',
                'department_id'     => 1,
            ],
            [
                'name'              => 'OTP',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Failed withdrawal',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Wallet under Maintenance',
                'department_id'     => 1,
            ],
            [
                'name'              => '2FA not working',
                'department_id'     => 1,
            ],
            [
                'name'              => 'How to',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Unregistered email',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Security Questions',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Easy loans',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Easy save',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Fees',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Blacklist',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Airdrops/ adding new coins',
                'department_id'     => 1,
            ],
            [
                'name'              => 'IP Address Block',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Balance issue / Auditing',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Email change',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Fraudulent wallet address (withdrawal - Maroon)',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Missing/Invalid destination tag',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Crypto Manual Credit (Pay wallet)',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Update details',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Request more info',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Security Unblock (67)',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Access Issue',
                'department_id'     => 1,
            ],
            [
                'name'              => 'FICA',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Disable Account',
                'department_id'     => 1,
            ],
            [
                'name'              => 'OTP Withdrawal Confirmation',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Market - Easy buy & sell',
                'department_id'     => 1,
            ],
            [
                'name'              => 'Limit - Home page',
                'department_id'     => 1,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'department_id' => $category['department_id'],
            ]);
        }
    }
}
