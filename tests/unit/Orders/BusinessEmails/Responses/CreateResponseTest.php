<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;

class BusinessEmailOrderResponseTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->response = new CreateResponse([
            'invoiceid' => '77433277',
            'sellingcurrencysymbol' => 'GBP',
            'sellingamount' => '1.25',
            'unutilisedsellingamount' => '1.00',
            'customerid' => 17824872,
        ]);
    }

    public function testInvoiceId()
    {
        $this->assertEquals(77433277, $this->response->invoiceId());
    }

    public function testSellingCurrencySymbol()
    {
        $this->assertEquals('GBP', $this->response->sellingCurrencySymbol());
    }

    public function testSellingCurrency()
    {
        $this->assertInstanceOf(Currency::class, $this->response->sellingCurrency());
        $this->assertEquals('GBP', $this->response->sellingCurrency());
    }

    public function testSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->sellingAmount());
        $this->assertEquals(125, $this->response->sellingAmount()->getAmount());
    }

    public function testTransactionAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->transactionAmount());
        $this->assertEquals(100, $this->response->transactionAmount()->getAmount());
    }

    public function testCustomerId()
    {
        $this->assertEquals(17824872, $this->response->customerId());
    }
}
