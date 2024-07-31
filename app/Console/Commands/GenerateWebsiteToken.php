<?php

namespace App\Console\Commands;

use App\Mail\TokenMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;

class GenerateWebsiteToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:jwt-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a JWT Website Token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::first(); // or create a special user for this purpose

        if (!$user) {
            $this->error('User not found');
            return 1;
        }

        $token = JWTAuth::fromUser($user);

        // Send the token via email
        Mail::to(config('jwt.admin_mail'))->send(new TokenMail($token));

        $this->info('Token has been sent to your email.');
        return 0;
    }
}
