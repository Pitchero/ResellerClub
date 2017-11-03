<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderCreate;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderRequest;
use ResellerClub\Orders\InvoiceOption;

class BusinessEmailOrderCreateTest extends TestCase
{
    /**
     * @var CreateBusinessEmailOrder
     */
    private $business_email_order_create;

    public function testA()
    {
        $response = $this->business_email_order_create->order(
            new BusinessEmailOrderRequest(
                17824872,
                'some-domain.co.in',
                5,
                1,
                InvoiceOption::noInvoice()
            )
        );
        dd($response);

    }

    protected function setUp()
    {
        parent::setUp();
        $this->business_email_order_create = new BusinessEmailOrderCreate();
    }
}
