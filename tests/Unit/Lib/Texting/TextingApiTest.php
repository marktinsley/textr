<?php

namespace Tests\Unit\Lib\Texting;

use App\Lib\Texting\TextingApi;
use App\Models\TextMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;
use Twilio\Rest\Api\V2010\Account\MessageList;
use Twilio\Rest\Client;

class TextingApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function records_when_messages_were_sent()
    {
        // Arrange
        $message = TextMessage::factory()->create(['to' => '+18179661937']);
        $this->instance(
            Client::class,
            \Mockery::mock(Client::class, function (MockInterface $clientMock) use ($message) {
                $clientMock->messages = \Mockery::mock(MessageList::class, function (MockInterface $messagesMock) use ($message) {
                    $messagesMock->shouldReceive('create');
                });
            })
        );

        // Pre-check
        $this->assertNull($message->sent_at);

        // Execute
        app(TextingApi::class)->send($message);

        // Check
        $this->assertNotNull($message->sent_at);
    }
}
