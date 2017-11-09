<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;

class BusinessEmailOrderResponseTest extends TestCase
{
    public function testInvoiceId()
    {
        $businessEmailOrderResource = new CreateResponse([
            'invoiceid' => 77433277
        ]);

        $this->assertEquals(77433277, $businessEmailOrderResource->invoiceId());
    }

    public function testSellingCurrency()
    {
        $businessEmailOrderResource = new CreateResponse(
            ['sellingcurrencysymbol' => '£']
        );

        $this->assertEquals('£', $businessEmailOrderResource->sellingCurrency());
    }

    public function testSellingAmount()
    {
        $businessEmailOrderResource = new CreateResponse([
            'sellingamount' => '1.25'
        ]);

        $this->assertEquals('1.25', $businessEmailOrderResource->sellingAmount());
    }

    public function testTransactionAmount()
    {
        $businessEmailOrderResource = new CreateResponse([
            'unutilisedsellingamount' => '1.00'
        ]);

        $this->assertEquals('1.00', $businessEmailOrderResource->transactionAmount());
    }

    public function testCustomerId()
    {
        $businessEmailOrderResource = new CreateResponse([
            'customerid' => 17824872
        ]);

        $this->assertEquals(17824872, $businessEmailOrderResource->customerId());
    }
}
