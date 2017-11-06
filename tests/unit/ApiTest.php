<?php

namespace ResellerClub\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;

class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private $api;

    public function testPost()
    {
        $this->assertInstanceOf(Response::class, $this->api->post('post', ['request-param' => 123]));
    }

    public function testBusinessEmailOrder()
    {
        $this->assertInstanceOf(BusinessEmailOrder::class, $this->api->businessEmailOrder());
    }

    protected function setUp()
    {
        parent::setUp();

        $mock = new MockHandler([
            new Response(200)
        ]);

        $this->api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );
    }
}
