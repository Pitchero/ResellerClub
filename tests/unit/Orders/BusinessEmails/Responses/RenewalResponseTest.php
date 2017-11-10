<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\RenewalResponse;

class RenewalResponseTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->resource = new RenewalResponse([
            'description' => 'Test description',
            'entityid' => '123',
            'actiontype' => 'Renew',
            'actiontypedesc' => 'Renewal of Business Email 1 for example.com for 1 month',
            'eaqid' => '461863406',
            'actionstatus' => 'InvoicePaid',
            'actionstatusdesc' => 'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            'invoiceid' => '123',
            'sellingcurrencysymbol' => 'GBP',
            'sellingamount' => '18.99',
            'unutilisedsellingamount' => '1.01',
            'customerid' => '123',
        ]);
    }

    public function testItCanGetDescription()
    {
        $this->assertEquals('Test description', $this->resource->description());
    }

    public function testItCanGetEntityId()
    {
        $this->assertEquals(123, $this->resource->entityId());
    }

    public function testItCanGetActionType()
    {
        $this->assertEquals('Renew', $this->resource->actiontype);
    }

    public function testItCanGetActionTypeDescription()
    {
        $this->assertEquals(
            'Renewal of Business Email 1 for example.com for 1 month',
            $this->resource->actionTypeDescription()
        );
    }

    public function testItCanGetActionId()
    {
        $this->assertEquals(461863406, $this->resource->actionId());
    }

    public function testItCanGetActionStatus()
    {
        $this->assertEquals('InvoicePaid', $this->resource->actionStatus());
    }

    public function testItCanGetActionStatusDescription()
    {
        $this->assertEquals(
            'Your Order will be processed by our automatic provisioning system in the next 5-10 minutes.',
            $this->resource->actionStatusDescription()
        );
    }

    public function testItCanGetInvoiceId()
    {
        $this->assertEquals(123, $this->resource->invoiceId());
    }

    public function testItCanGetSellingCurrencySymbol()
    {
        $this->assertEquals('GBP', $this->resource->sellingCurrencySymbol());
    }

    public function testItCanGetSellingCurrency()
    {
        $this->assertInstanceOf(Currency::class, $this->resource->sellingCurrency());
    }

    public function testItCanGetSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->resource->sellingAmount());
        $this->assertEquals(1899, $this->resource->sellingAmount()->getAmount());
    }

    public function testItCanGetUnutilisedSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->resource->unutilisedSellingAmount());
        $this->assertEquals(101, $this->resource->unutilisedSellingAmount()->getAmount());
    }

    public function testItCanGetCustomerId()
    {
        $this->assertEquals(123, $this->resource->customerId());
    }
}
