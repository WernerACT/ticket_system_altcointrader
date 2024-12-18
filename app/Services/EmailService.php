<?php

namespace App\Services;

use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailService
{
    public function sendEmail(Email $email): void
    {
        try {
            Log::info("Sending email to {$email->recipient_email}");

            Mail::send([], [], function ($message) use ($email) {

                dump($email->message);

                $message->from('docs@altcointrader.co.za', 'AltCoinTrader Docs')
                    ->to($email->recipient_email)
                    ->subject($email->subject)
                    ->html(view('emails.internal_email', ['message' => $email->message])->render());
            });

            $email->update(['status' => 'sent']);

            Log::info("Email sent successfully to {$email->recipient_email}");
        } catch (\Throwable $e) {
            Log::error("Failed to send email to {$email->recipient_email}: {$e->getMessage()}", [
                'exception' => $e,
            ]);

            throw $e;
        }
    }
}
