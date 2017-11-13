<?php

namespace Tests\Unit\Orders\BusinessEmails;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;

class BusinessEmailOrderResponseTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->response = $this->createResponse();
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

    /**
     * @dataProvider sellingAmountProvider
     */
    public function testSellingAmount($response, $expectedAmount)
    {
        $this->assertInstanceOf(Money::class, $response->sellingAmount());
        $this->assertEquals($expectedAmount, $response->sellingAmount()->getAmount());
    }

    /**
     * @dataProvider transactionAmountProvider
     */
    public function testTransactionAmount($response, $expectedAmount)
    {
        $this->assertInstanceOf(Money::class, $response->transactionAmount());
        $this->assertEquals($expectedAmount, $response->transactionAmount()->getAmount());
    }

    public function testCustomerId()
    {
        $this->assertEquals(17824872, $this->response->customerId());
    }

    public function sellingAmountProvider()
    {
        return [
            [
                $this->createResponse(['sellingamount' => '100.00']),
                10000,
            ],
            [
                $this->createResponse(['sellingamount' => '2.50']),
                250,
            ],
            [
                $this->createResponse(['sellingamount' => '9.99']),
                999,
            ],
        ];
    }

    public function transactionAmountProvider()
    {
        return [
            [
                $this->createResponse(['unutilisedsellingamount' => '0.00']),
                0,
            ],
            [
                $this->createResponse(['unutilisedsellingamount' => '1.23']),
                123,
            ],
            [
                $this->createResponse(['unutilisedsellingamount' => '145.78']),
                14578,
            ],
        ];
    }

    private function createResponse(array $overrides = [])
    {
        $defaults = [
            'invoiceid' => '77433277',
            'sellingcurrencysymbol' => 'GBP',
            'sellingamount' => '1.25',
            'unutilisedsellingamount' => '1.00',
            'customerid' => '17824872',
        ];

        return new CreateResponse(array_merge($defaults, $overrides));
    }
}
