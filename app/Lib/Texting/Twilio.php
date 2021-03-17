<?php

namespace App\Lib\Texting;

use App\Models\TextMessage;
use Twilio\Rest\Client;

class Twilio implements TextingApi
{
    private string $twilioNumber;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->twilioNumber = config('texting.services.twilio.from_number');
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     * @throws \Twilio\Exceptions\TwilioException
     */
    public function send(TextMessage $message): void
    {
        $this->client->messages->create(
            $message->to,
            [
                'from' => $this->twilioNumber,
                'body' => $message->body,
            ]
        );

        $message->fill(['sent_at' => now()])->save();
    }
}
