<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;

class CreateResponseTest extends TestCase
{
    /**
     * @var CreateResponse
     */
    private $response;

    protected function setUp()
    {
        parent::setUp();

        $this->response = $this->createResponse();
    }

    public function testOrderId()
    {
        $this->assertEquals(79767882, $this->response->orderId());
    }

    public function testDomain()
    {
        $this->assertEquals('test-domain.co.uk.onlyfordemo.com', $this->response->domain());
    }

    public function testActionId()
    {
        $this->assertEquals(466923107, $this->response->actionId());
    }

    public function testActionStatus()
    {
        $this->assertEquals('InvoicePaid', $this->response->actionStatus());
    }

    public function testActionStatusDescription()
    {
        $this->assertEquals(
            'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            $this->response->actionStatusDescription()
        );
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
            'entityid'                => '79767882',
            'description'             => 'test-domain.co.uk.onlyfordemo.com',
            'actionstatus'            => 'InvoicePaid',
            'actionstatusdesc'        => 'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            'actiontypedesc'          => 'Addition of Business Email 1 for test-domain.co.uk.onlyfordemo.com for 1 month',
            'status'                  => 'Success',
            'eaqid'                   => '466923107',
            'actiontype'              => 'Add',
            'invoiceid'               => '77433277',
            'sellingcurrencysymbol'   => 'GBP',
            'sellingamount'           => '1.25',
            'unutilisedsellingamount' => '1.00',
            'customerid'              => '17824872',
        ];

        return new CreateResponse(array_merge($defaults, $overrides));
    }
}
