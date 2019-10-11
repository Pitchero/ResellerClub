<?php

namespace Tests\Unit\Dns\A;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Dns\A\ARecord;
use ResellerClub\Dns\A\Requests\AddRequest;
use ResellerClub\Dns\A\Requests\UpdateRequest;
use ResellerClub\Dns\A\Responses\AddResponse;
use ResellerClub\Dns\A\Responses\UpdateResponse;
use ResellerClub\IPv4Address;
use ResellerClub\TimeToLive;

class ARecordTest extends TestCase
{
    public function testAddInstance(): void
    {
        $ARecord = new ARecord($this->api($this->mockResponse()));

        $addRequest = new AddRequest(
            'mytestdomain.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(AddResponse::class, $ARecord->add($addRequest));
    }

    public function testUpdateInstance(): void
    {
        $ARecord = new ARecord($this->api($this->mockResponse()));

        $updateRequest = new UpdateRequest(
            'mytestdomain.com',
            'www',
            new IPv4Address('127.0.0.1'),
            new IPv4Address('192.168.0.1'),
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(UpdateResponse::class, $ARecord->update($updateRequest));
    }

    private function api(MockHandler $mock): Api
    {
        $handler = HandlerStack::create($mock);

        return new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => $handler])
        );
    }

    /**
     * @return MockHandler
     */
    private function mockResponse(): MockHandler
    {
        return new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'response' => [
                        'status' => 'Success',
                    ],
                ])
            ),
        ]);
    }
}
