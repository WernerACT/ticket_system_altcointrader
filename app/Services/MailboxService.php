<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Webklex\IMAP\Facades\Client as IMAPClient;
use Webklex\PHPIMAP\Client;
use Webklex\PHPIMAP\Exceptions\AuthFailedException;
use Webklex\PHPIMAP\Exceptions\ConnectionFailedException;
use Webklex\PHPIMAP\Exceptions\FolderFetchingException;
use Webklex\PHPIMAP\Exceptions\GetMessagesFailedException;
use Webklex\PHPIMAP\Exceptions\ImapBadRequestException;
use Webklex\PHPIMAP\Exceptions\ImapServerErrorException;
use Webklex\PHPIMAP\Exceptions\ResponseException;
use Webklex\PHPIMAP\Exceptions\RuntimeException;
use Webklex\PHPIMAP\Support\MessageCollection;

class MailboxService {
    protected Client $client;

    /**
     * @throws RuntimeException
     * @throws ImapBadRequestException
     * @throws ConnectionFailedException
     * @throws ResponseException
     * @throws ImapServerErrorException
     * @throws AuthFailedException
     */
    public function __construct() {
        $this->client = IMAPClient::account('default');
        $this->client->connect();
    }

    /**
     * @throws RuntimeException
     * @throws ResponseException
     * @throws ImapServerErrorException
     * @throws GetMessagesFailedException
     * @throws FolderFetchingException
     * @throws ImapBadRequestException
     * @throws ConnectionFailedException
     * @throws AuthFailedException
     */
    public function getUnreadMessages(): MessageCollection {
        $folder = $this->client->getFolder('INBOX');
        return $folder->query()->unseen()->get();
    }

    /**
     * @throws RuntimeException
     * @throws ResponseException
     * @throws FolderFetchingException
     * @throws ImapBadRequestException
     * @throws ConnectionFailedException
     * @throws ImapServerErrorException
     * @throws AuthFailedException
     */
    public function markAsRead($messageId): void
    {

        $folder = $this->client->getFolder('INBOX');
        $messages = $folder->query()->uid($messageId)->get();

        if ($messages->isEmpty()) {
            Log::warning("No message found with ID: $messageId");
            return;
        }

        $message = $messages->first();
        if ($message) {
            $message->setFlag('Seen');
        }
    }

    public function getAttachments($message)
    {
        return $message->getAttachments();
    }
}


