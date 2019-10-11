<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\RenewalResponse;

class RenewalResponseTest extends TestCase
{
    /**
     * @var RenewalResponse
     */
    private $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new RenewalResponse([
            'description'             => 'Test description',
            'entityid'                => '123',
            'actiontype'              => 'Renew',
            'actiontypedesc'          => 'Renewal of Business Email 1 for example.com for 1 month',
            'eaqid'                   => '461863406',
            'actionstatus'            => 'InvoicePaid',
            'actionstatusdesc'        => 'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            'invoiceid'               => '123',
            'sellingcurrencysymbol'   => 'GBP',
            'sellingamount'           => '18.99',
            'unutilisedsellingamount' => '1.01',
            'customerid'              => '123',
        ]);
    }

    public function testItCanGetDescription(): void
    {
        $this->assertEquals('Test description', $this->response->description());
    }

    public function testItCanGetEntityId(): void
    {
        $this->assertEquals(123, $this->response->entityId());
    }

    public function testItCanGetActionType(): void
    {
        $this->assertEquals('Renew', $this->response->actiontype);
    }

    public function testItCanGetActionTypeDescription(): void
    {
        $this->assertEquals(
            'Renewal of Business Email 1 for example.com for 1 month',
            $this->response->actionTypeDescription()
        );
    }

    public function testItCanGetActionId(): void
    {
        $this->assertEquals(461863406, $this->response->actionId());
    }

    public function testItCanGetActionStatus(): void
    {
        $this->assertEquals('InvoicePaid', $this->response->actionStatus());
    }

    public function testItCanGetActionStatusDescription(): void
    {
        $this->assertEquals(
            'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            $this->response->actionStatusDescription()
        );
    }

    public function testItCanGetInvoiceId(): void
    {
        $this->assertEquals(123, $this->response->invoiceId());
    }

    public function testItCanGetSellingCurrencySymbol(): void
    {
        $this->assertEquals('GBP', $this->response->sellingCurrencySymbol());
    }

    public function testItCanGetSellingCurrency(): void
    {
        $this->assertInstanceOf(Currency::class, $this->response->sellingCurrency());
    }

    public function testItCanGetSellingAmount(): void
    {
        $this->assertInstanceOf(Money::class, $this->response->sellingAmount());
        $this->assertEquals(1899, $this->response->sellingAmount()->getAmount());
    }

    public function testItCanGetUnutilisedSellingAmount(): void
    {
        $this->assertInstanceOf(Money::class, $this->response->unutilisedSellingAmount());
        $this->assertEquals(101, $this->response->unutilisedSellingAmount()->getAmount());
    }

    public function testItCanGetCustomerId(): void
    {
        $this->assertEquals(123, $this->response->customerId());
    }
}
