<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Exceptions\AlreadyRenewedException;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;
use ResellerClub\Orders\Domains\DomainOrder;
use ResellerClub\Orders\EmailAccounts\EmailAccount;
use ResellerClub\Orders\EmailForwarders\EmailForwarder;

class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();

        $mock = new MockHandler([
            new Response(200),
        ]);

        $this->api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );
    }

    public function testGet(): void
    {
        $this->assertInstanceOf(Response::class, $this->api->get('get', ['request-param' => 123]));
    }

    public function testPost(): void
    {
        $this->assertInstanceOf(Response::class, $this->api->post('post', ['request-param' => 123]));
    }

    public function testApiClientException(): void
    {
        $mock = new MockHandler([
            new ClientException('a', new Request('POST', 'test')),
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ApiClientException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testConnectionException(): void
    {
        $mock = new MockHandler([
            new ConnectException('Error Communicating with Server', new Request('POST', 'test')),
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ConnectionException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testAlreadyRenewedException(): void
    {
        $mock = new MockHandler([
            new ServerException('Domain already renewed.', new Request('POST', 'test')),
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(AlreadyRenewedException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testApiException(): void
    {
        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('POST', 'test')),
        ]);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => HandlerStack::create($mock)])
        );

        $this->expectException(ApiException::class);
        $api->post('post', ['request-param' => 123]);
    }

    public function testBusinessEmailOrder(): void
    {
        $this->assertInstanceOf(BusinessEmailOrder::class, $this->api->businessEmailOrder());
    }

    public function testDomainOrder(): void
    {
        $this->assertInstanceOf(DomainOrder::class, $this->api->domainOrder());
    }

    public function testEmailAccount(): void
    {
        $this->assertInstanceOf(EmailAccount::class, $this->api->emailAccount());
    }

    public function testEmailForwarder(): void
    {
        $this->assertInstanceOf(EmailForwarder::class, $this->api->emailForwarder());
    }
}
