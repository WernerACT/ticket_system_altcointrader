<?php

namespace Database\Seeders;

use App\Models\CannedResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CannedResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cannedResponses = [
            [
                'name' => 'Username already in use',
                'department_id' => 1,
                'keywords' => ["register", "username", "new", "account", "copy", "ID"],
                'body' => 'Please be aware that the selected username may already be in use. Therefore, please register with a different username.

            Please note that you can create a new account using this e-mail address. However, if you have previously registered, we kindly request that you provide us with a copy of your ID. This will enable us to attempt to retrieve your account.'
            ],
            [
                'name' => 'Account recovery email address',
                'department_id' => 1,  // Replace with actual department ID
                'keywords' => ['email', 'registered', 'AltCoinTrader', 'account', 'recovery', 'ID', 'passport'],
                'body' => 'Kindly be aware that the email address you are using to send your message is not registered on AltCoinTrader. To help you recover your account, we kindly request that you furnish us with a copy of your ID or passport.'
            ],
            [
                'name' => 'Account recovery - new email',
                'department_id' => 1, // Replace with the actual department ID
                'keywords' => ['email', 'registered', 'received', 'account', 'recovery', 'assist'],
                'body' => 'Please note that we have sent an email to your registered email address. Kindly state if you have received the email on your registered email so we may further assist.'
            ],
            [
                'name' => 'Account recovery - old email',
                'department_id' => 1, // Replace with the actual department ID
                'keywords' => ['email', 'recovery', 'AltCoinTrader', 'account', 'receipt', 'assist'],
                'body' => 'Kindly note that this email was sent to recover your AltCoinTrader account. Kindly reply to this email confirming receipt of this email so that we may further assist.'
            ],
            [
                'name' => 'Create a new account (Recovery account not found)',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['new account', 'recovery', 'not found', 'create', 'email', 'registration', 'AltCoinTrader', 'Help Centre'],
                'body' => 'Please be informed that the account associated with the details provided is still not found. Please create a new account using your new email address.

    To guide you through the registration process on AltCoinTrader, please visit our Help Centre using the following link:'
            ],
            [
                'name' => 'No query stated - Empty email',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['email', 'insufficient', 'content', 'query', 'respond', 'assistance'],
                'body' => 'We have received your email with insufficient content. To provide you with assistance, kindly respond to this email with your query.'
            ],
            [
                'name' => 'No query stated - More info',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['elaborate', 'inquiry', 'additional', 'information', 'screenshots', 'assist'],
                'body' => 'Please elaborate on your inquiry and provide us with any additional information including screenshots in order for us to further assist.'
            ],
            [
                'name' => 'Working on query',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['acknowledged', 'query', 'working', 'solution', 'ticket', 'earliest', 'patience', 'cooperation'],
                'body' => 'We have acknowledged your query and are currently working on the matter. We will provide a solution to your ticket at the earliest possible time. Thank you for your patience and cooperation.'
            ],
            [
                'name' => 'Closing an email',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['do not hesitate', 'contact', 'support', 'assistance', 'AltCoinTrader', 'account'],
                'body' => 'Please do not hesitate to contact support if you require further assistance with your AltCoinTrader account.'
            ],
            [
                'name' => 'Query resolved telephonically',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['resolved', 'telephonically', 'closed', 'ticket', 'reply', 'reopen'],
                'body' => 'Kindly note that this ticket will be closed as your query has been resolved telephonically. Please reply to this email for further information or to reopen the ticket.'
            ],
            [
                'name' => 'New reference generated',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['reference number', 'generated', 'AltCoinTrader', 'account', 'log in', 'Deposit', 'green block'],
                'body' => 'Kindly note that a reference number has been generated for your AltCoinTrader account. Kindly log in to your AltCoinTrader account and navigate to Deposit. You may find your reference number in the green block.'
            ],
            [
                'name' => 'Wallet status',
                'department_id' => 1, // Replace with the actual department ID
                'keywords' => ['check', 'current status', 'cryptocurrencies', 'maintenance status', 'link'],
                'body' => 'To check the current status of our listed cryptocurrencies and their maintenance status, kindly click on the link below.'
            ],
            [
                'name' => 'Access denied status page (Cloudflare)',
                'department_id' => 1, // Replace with actual department ID
                'keywords' => ['technical details', 'geographic location', 'IP address', 'VPN', 'another device', 'reboot'],
                'body' => 'To enable us to provide optimal assistance regarding this matter, please furnish us with the following technical details:

    - What is your current geographic location?
    - What is your internet public IP address?
    - To view your internet IP address on the affected device, please use this link: [What is my IP](https://www.google.com/search?q=what+is+my+ip)
    - Are you using a VPN service?
    - Have you attempted to access the website/app from another device within your home/office?

    Kindly reboot your device if the website is functional on another device within your home/office.'
            ],

        ];

        foreach ($cannedResponses as $response) {
            CannedResponse::create($response);
        }
    }
}
