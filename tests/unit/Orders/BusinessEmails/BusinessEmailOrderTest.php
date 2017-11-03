<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderRequest;
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
        $this->business_email_order = new BusinessEmailOrder(
            new Api(
                new Config(123, 'api_key', true)
            )
        );
    }
}
