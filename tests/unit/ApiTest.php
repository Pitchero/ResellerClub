<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;

class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private $api;

    public function testGet()
    {
        $this->assertInstanceOf(Response::class, $this->api->get('get', ['request-param' => 123]));
    }

    public function testPost()
    {
        $this->assertInstanceOf(Response::class, $this->api->post('post', ['request-param' => 123]));
    }

    public function testApiClientException()
    {
        $mock = new MockHandler([
            new ClientException('a',  new Request('POST', 'test'))
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ApiClientException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testConnectionException()
    {
        $mock = new MockHandler([
            new ConnectException("Error Communicating with Server", new Request('POST', 'test'))
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ConnectionException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testApiException()
    {
        $mock = new MockHandler([
            new RequestException("Error Communicating with Server", new Request('POST', 'test'))
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ApiException::class);
        $api->post('post', ['request-param' => 123]);
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
