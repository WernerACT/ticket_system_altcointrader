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
                $attachments = $message->getAttachments()->toArray();

                // Check if any attachment exceeds 8MB (8 * 1024 * 1024 bytes)
                $largeAttachment = array_filter($attachments, function ($attachment) {
                    return $attachment->getSize() > (8 * 1024 * 1024);
                });

                if (!empty($largeAttachment)) {
                    // Move the email to the "temp" folder
                    $this->moveMessageToFolder($message, 'temp');
                    $this->info("Moved email with subject '{$message->getSubject()}' to the 'temp' folder due to large attachment.");
                    continue;
                }

                // Proceed with normal processing if no large attachments are found
                $email = [
                    'subject' => $message->getSubject()->toString(),
                    'from' => $message->getFrom()[0]->mail,
                    'body' => $message->getTextBody(),
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

    /**
     * Move a message to a different folder.
     *
     * @param \Webklex\PHPIMAP\Message $message
     * @param string $folderName
     * @return void
     */
    protected function moveMessageToFolder($message, $folderName): void
    {
        // Assuming you have a client instance in your MailboxService
        $folder = $message->getClient()->getFolder($folderName);
        $message->move($folder->path);
    }

}
