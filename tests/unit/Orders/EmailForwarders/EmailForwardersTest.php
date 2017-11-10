<?php

namespace ResellerClub\Orders\EmailForwarders\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\EmailForwarders\EmailForwarders;
use ResellerClub\Orders\EmailForwarders\Requests\DeleteRequest;
use ResellerClub\Orders\EmailForwarders\Responses\DeletedResponse;
use ResellerClub\Orders\Order;

class EmailForwardersTest extends TestCase
{


    public function testResponseFromBusinessEmailOrderDelete()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode(['status' => 'Success']))
        ]);

        $emailForwarders = new EmailForwarders($this->api($mock));

        $this->assertInstanceOf(
            DeletedResponse::class,
            $emailForwarders->delete(
                new DeleteRequest(
                    new Order($id = 123),
                    $email = 'john.doe@my-domain.co.uk',
                    $forwarders = 'jane.doe@my-domain.co.uk, stan.smith@my-domain.co.uk'
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
