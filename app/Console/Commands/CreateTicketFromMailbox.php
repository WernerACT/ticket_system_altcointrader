<?php

namespace App\Console\Commands;

use App\Jobs\ProcessEmailIntoTicket;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use App\Services\MailboxService;


class CreateTicketFromMailbox extends Command implements Isolatable
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to retrieve messages from the mailbox and create tickets from the content.';

    /**
     * Execute the console command.
     */
    public function handle(MailboxService $mailboxService): void
    {
        try {
            $messages = $mailboxService->getUnreadMessages();

            foreach ($messages as $message) {

                $rawBody = $this->handleFormatFlowed($message->getRawBody());

                $attachments = $message->getAttachments()->toArray();

                // Proceed with normal processing if no large attachments are found
                $email = [
                    'subject' => $message->getSubject()->toString(),
                    'from' => $message->getFrom()[0]->mail,
                    'body' => $rawBody,
                    'html' => $message->getHTMLBody(),
                    'date' => $message->getDate()->toDate(),
                    'messageId' => $message->getUid(),
                    'attachments' => array_map(function ($attachment) {
                        return [
                            'name' => $attachment->getName(),
                            'type' => $attachment->getMimeType(),
                            'content' => base64_encode($attachment->getContent()),
                            'size' => $attachment->getSize()
                        ];
                    }, $attachments),
                ];

                ProcessEmailIntoTicket::dispatch($email);
            }
        } catch (Exception $e) {
            $this->error("An error occurred: " . $e->getMessage());
        }
    }

    protected function handleFormatFlowed(string $text): string
    {
        // Replace soft line breaks (which are indicated by a newline followed by a space)
        $text = preg_replace('/(?<!\r\n)\r\n(?!\r\n)/', '', $text);

        // Also handle any other cases of soft breaks followed by a space
        $text = preg_replace('/\n /', '', $text);

        return $text;
    }

}
