<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderRequest;
use ResellerClub\Orders\BusinessEmails\Resources\BusinessEmailOrderResource;
use ResellerClub\Orders\BusinessEmails\Resources\CreateResource;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class BusinessEmailOrderTest extends TestCase
{
    public function testResponseFromBusinessEmailOrderCreate()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'description' => 'some-domain.co.in',
                    'entityid' => 123,
                    'actiontype' => 'Add',
                    'actiontypedesc' => 'Addition of Business Email 1 for testdomainmail.com for 1 month',
                    'eaqid' => '461331388',
                    'actionstatus' => 'PendingExecution',
                    'actionstatusdesc' => '',
                    'invoiceid' => '77433277',
                    'sellingcurrencysymbol' => '£',
                    'sellingamount' => '1.25',
                    'unutilisedsellingamount' => '1.00',
                    'customerid' => 17824872,
                ]))
        ]);

        $business_email_order = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
        CreateResource::class,
            $business_email_order->create(
                new BusinessEmailOrderRequest(
                    17824872,
                    'some-domain.co.in',
                    5,
                    1,
                    InvoiceOption::noInvoice()
                )
            )
        );
    }

    public function testResponseFromBusinessEmailOrderDelete()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'description' => 'some-domain.co.in',
                    'entityid' => 123,
                    'actiontype' => 'Add',
                    'actiontypedesc' => 'Addition of Business Email 1 for testdomainmail.com for 1 month',
                    'eaqid' => '461331388',
                    'actionstatus' => 'PendingExecution',
                    'actionstatusdesc' => '',
                ]))
        ]);

        $business_email_order = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
            BusinessEmailOrderResource::class,
            $business_email_order->delete(
                new Order(123)
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
