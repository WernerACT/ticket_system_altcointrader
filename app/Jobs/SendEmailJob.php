<?php

namespace App\Jobs;

use App\Models\Email;
use App\Services\EmailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use SerializesModels;

    public $emailId;

    public function __construct(int $emailId)
    {
        $this->emailId = $emailId;
    }

    public function handle(EmailService $emailService): void
    {
        try {
            $email = Email::find($this->emailId);

            if (!$email) {
                Log::error("Email with ID {$this->emailId} not found.");
                return;
            }

            $emailService->sendEmail($email);
        } catch (\Throwable $e) {
            Log::error("Error processing SendEmailJob for Email ID {$this->emailId}: {$e->getMessage()}", [
                'exception' => $e,
            ]);

            throw $e; // Re-throw the exception to mark the job as failed
        }
    }
}

