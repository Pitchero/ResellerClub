<?php

namespace unit\Dns\Mx;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Dns\Mx\Requests\AddRequest;
use ResellerClub\Dns\Mx\Responses\AddResponse;
use ResellerClub\Dns\Mx\MxRecord;
use ResellerClub\Dns\Mx\Requests\UpdateRequest;
use ResellerClub\Dns\Mx\Responses\UpdateResponse;
use ResellerClub\TimeToLive;

class MxRecordTest extends TestCase
{
    public function testAddInstance()
    {
        $MxRecord = new MxRecord($this->api($this->mockResponse()));

        $addRequest = new AddRequest(
            'mytestdomain.com',
            'mx1',
            '123.456.789',
            10,
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(AddResponse::class, $MxRecord->add($addRequest));
    }

    public function testUpdateInstance()
    {
        $MxRecord = new MxRecord($this->api($this->mockResponse()));

        $updateRequest = new UpdateRequest(
            'mytestdomain.com',
            '@',
            '123.456.789',
            '123.456.987',
            5,
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(UpdateResponse::class, $MxRecord->update($updateRequest));
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