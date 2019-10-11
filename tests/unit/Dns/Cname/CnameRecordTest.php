<?php

namespace Tests\Unit\Dns\Cname;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Dns\Cname\CnameRecord;
use ResellerClub\Dns\Cname\Requests\AddRequest;
use ResellerClub\Dns\Cname\Requests\UpdateRequest;
use ResellerClub\Dns\Cname\Responses\AddResponse;
use ResellerClub\Dns\Cname\Responses\UpdateResponse;
use ResellerClub\TimeToLive;

class CnameRecordTest extends TestCase
{
    public function testAddInstance(): void
    {
        $cnameRecord = new CnameRecord($this->api($this->mockResponse()));

        $addRequest = new AddRequest(
            'mytestdomain.com',
            'www',
            'cname.new.com',
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(AddResponse::class, $cnameRecord->add($addRequest));
    }

    public function testUpdateInstance(): void
    {
        $cnameRecord = new CnameRecord($this->api($this->mockResponse()));

        $updateRequest = new UpdateRequest(
            'mytestdomain.com',
            'www',
            'cname.old.com',
            'cname.new.com',
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(UpdateResponse::class, $cnameRecord->update($updateRequest));
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
