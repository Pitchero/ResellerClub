<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Resources\CreateResource;

class BusinessEmailOrderResourceTest extends TestCase
{
    public function testInvoiceId()
    {
        $business_email_order_resource = new CreateResource([
            'invoiceid' => 77433277
        ]);

        $this->assertEquals(77433277, $business_email_order_resource->invoiceId());
    }

    public function testSellingCurrency()
    {
        $business_email_order_resource = new CreateResource(
            ['sellingcurrencysymbol' => '£']
        );

        $this->assertEquals('£', $business_email_order_resource->sellingCurrency());
    }

    public function testSellingAmount()
    {
        $business_email_order_resource = new CreateResource([
            'sellingamount' => '1.25'
        ]);

        $this->assertEquals('1.25', $business_email_order_resource->sellingAmount());
    }

    public function testTransactionAmount()
    {
        $business_email_order_resource = new CreateResource([
            'unutilisedsellingamount' => '1.00'
        ]);

        $this->assertEquals('1.00', $business_email_order_resource->transactionAmount());
    }

    public function testCustomerId()
    {
        $business_email_order_resource = new CreateResource([
            'customerid' => 17824872
        ]);

        $this->assertEquals(17824872, $business_email_order_resource->customerId());
    }
}
