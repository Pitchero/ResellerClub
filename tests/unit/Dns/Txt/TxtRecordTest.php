<?php

namespace unit\Dns\Txt;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Dns\Txt\Requests\DeleteRequest;
use ResellerClub\Dns\Txt\Responses\DeleteResponse;
use ResellerClub\Dns\Txt\TxtRecord;
use ResellerClub\Dns\Txt\Requests\AddRequest;
use ResellerClub\Dns\Txt\Requests\UpdateRequest;
use ResellerClub\Dns\Txt\Responses\AddResponse;
use ResellerClub\Dns\Txt\Responses\UpdateResponse;
use ResellerClub\TimeToLive;

class TxtRecordTest extends TestCase
{
    public function testAddInstance()
    {
        $TxtRecord = new TxtRecord($this->api($this->mockResponse()));

        $addRequest = new AddRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789',
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(AddResponse::class, $TxtRecord->add($addRequest));
    }

    public function testUpdateInstance()
    {
        $TxtRecord = new TxtRecord($this->api($this->mockResponse()));

        $updateRequest = new UpdateRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789',
            'v=spf1 ip4:123.456.987',
            new TimeToLive(7200)
        );

        $this->assertInstanceOf(UpdateResponse::class, $TxtRecord->update($updateRequest));
    }

    public function testDeleteInstance()
    {
        $TxtRecord = new TxtRecord($this->api($this->mockResponse()));

        $deleteRequest = new DeleteRequest(
            'mytestdomain.com',
            '@',
            'v=spf1 ip4:123.456.789'
        );

        $this->assertInstanceOf(DeleteResponse::class, $TxtRecord->delete($deleteRequest));
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
                        'status' => 'Success',
                ])
            ),
        ]);
    }
}