<?php

namespace App\Console\Commands;

use App\Jobs\ProcessEmailIntoTicket;
use App\Services\MailboxService;
use Illuminate\Console\Command;

class CreateTicketFromMailbox extends Command {
    protected $signature = 'import:email';
    protected $description = 'Command to retrieve messages from the mailbox and create tickets from the content.';

    public function handle(): void {
        $mailboxes = ['support', 'audits', 'fraud', 'metals', 'docs'];

        foreach ($mailboxes as $mailbox) {
            $this->processMailbox($mailbox);
        }
    }

    protected function processMailbox(string $mailbox): void {
        try {
            $mailboxService = new MailboxService($mailbox);
            $messages = $mailboxService->getUnreadMessages();

            foreach ($messages as $message) {
                $rawBody = $this->handleFormatFlowed($message->getRawBody());
                $attachments = $message->getAttachments()->toArray();

                $email = [
                    'subject' => $message->getSubject()->toString(),
                    'department' => $mailbox,
                    'from' => $message->getFrom()[0]->mail,
                    'cc' => $message->getCc(),
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
                $mailboxService->markAsRead($message->getUid());
            }

            $mailboxService->disconnect();

        } catch (\Exception $e) {
            $this->error("An error occurred while processing the mailbox '$mailbox': " . $e->getMessage());
        }
    }

    protected function handleFormatFlowed(string $text): string {
        $text = preg_replace('/(?<!\r\n)\r\n(?!\r\n)/', '', $text);
        $text = preg_replace('/\n /', '', $text);

        return $text;
    }
}

