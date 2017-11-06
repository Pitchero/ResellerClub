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
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderResource;
use ResellerClub\Orders\InvoiceOption;

class BusinessEmailOrderTest extends TestCase
{
    /**
     * @var BusinessEmailOrder
     */
    private $business_email_order;

    public function testResponseFromBusinessEmailOrderCreate()
    {
        $this->assertInstanceOf(
        BusinessEmailOrderResource::class,
            $this->business_email_order->create(
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

    protected function setUp()
    {
        parent::setUp();

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

        $handler = HandlerStack::create($mock);

        $api = new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => $handler])
        );

        $this->business_email_order = new BusinessEmailOrder($api);
    }
}
