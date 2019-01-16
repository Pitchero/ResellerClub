<?php

namespace Tests\Unit\Orders\BusinessEmails;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\Domains\DomainOrder;
use ResellerClub\Orders\Domains\DomainOrderDetailType;
use ResellerClub\Orders\Domains\Requests\GetRequest;
use ResellerClub\Orders\Domains\Responses\GetResponse;
use ResellerClub\Orders\Order;

class DomainOrderTest extends TestCase
{
    public function testResponseFromDomainOrderGet()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                ])
            ),
        ]);

        $domainOrder = new DomainOrder($this->api($mock));

        $this->assertInstanceOf(
            GetResponse::class,
            $domainOrder->get(
                new GetRequest(
                    new Order(123),
                    DomainOrderDetailType::all()
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
