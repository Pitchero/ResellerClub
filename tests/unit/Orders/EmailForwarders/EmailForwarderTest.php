<?php

namespace Tests\Unit\Orders\EmailForwarders;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;
use ResellerClub\Orders\EmailForwarders\EmailForwarder;
use ResellerClub\Orders\Order;

class EmailForwarderTest extends TestCase
{
    public function testResponseFromEmailForwarderDelete()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'response' => [
                        'status' => 'Success'
                    ]
                ])
            ),
        ]);

        $emailForwarders = new EmailForwarder($this->api($mock));

        $this->assertInstanceOf(
            DeletedResponse::class,
            $emailForwarders->delete(
                new DeleteRequest(
                    new Order($id = 123),
                    new EmailAddress($email = 'john.doe@my-domain.co.uk')
                )
            )
        );
    }

    private function api(MockHandler $mock): Api
    {
        $handler = HandlerStack::create($mock);

        return new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => $handler])
        );
    }
}
