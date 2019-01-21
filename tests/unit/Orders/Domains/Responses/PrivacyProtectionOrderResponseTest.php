<?php

namespace Tests\Unit\Orders\Domains\Responses;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Action;
use ResellerClub\Exceptions\FeatureNotAvailableException;
use ResellerClub\Orders\Domains\Responses\PrivacyProtectionOrderResponse;
use ResellerClub\Orders\Domains\Responses\RenewalResponse;

class PrivacyProtectionOrderResponseTest extends TestCase
{
    /**
     * @var RenewalResponse
     */
    private $response;

    protected function setUp()
    {
        parent::setUp();

        $this->response = new PrivacyProtectionOrderResponse([
            'actiontypedesc'          => 'Purchase of Privacy Protection Service for domain wibble-wibble.net',
            'unutilisedsellingamount' => '0.000',
            'sellingamount'           => '0.000',
            'entityid'                => '85575828',
            'actionstatus'            => 'Success',
            'status'                  => 'Success',
            'eaqid'                   => '524956079',
            'customerid'              => '17824872',
            'description'             => 'wibble-wibble.net',
            'actiontype'              => 'PurchasePrivacyProtection',
            'invoiceid'               => '88768089',
            'sellingcurrencysymbol'   => 'GBP',
            'actionstatusdesc'        => 'Operation completed successfully',
        ]);
    }

    public function testFeatureNotAvailableExceptionThrown()
    {
        $this->expectException(FeatureNotAvailableException::class);

        new PrivacyProtectionOrderResponse([
            'entityid' => '85575828',
            'status'   => 'error',
            'error'    => 'Privacy Protection Service not available.',
        ]);
    }

    public function testItCanOrderId()
    {
        $this->assertEquals(85575828, $this->response->orderId());
    }

    public function testItCanGetDescription()
    {
        $this->assertEquals('wibble-wibble.net', $this->response->description());
    }

    public function testItCanGetAction()
    {
        $action = $this->response->action();
        $this->assertInstanceOf(Action::class, $action);
        $this->assertEquals(524956079, $action->id());
        $this->assertEquals('PurchasePrivacyProtection', $action->type());
        $this->assertEquals(
            'Purchase of Privacy Protection Service for domain wibble-wibble.net',
            $action->typeDescription()
        );
        $this->assertEquals('Success', $action->status());
        $this->assertEquals('Operation completed successfully', $action->statusDescription());
    }

    public function testItCanGetInvoiceId()
    {
        $this->assertEquals(88768089, $this->response->invoiceId());
    }

    public function testItCanGetSellingCurrencySymbol()
    {
        $this->assertEquals('GBP', $this->response->sellingCurrencySymbol());
    }

    public function testItCanGetSellingCurrency()
    {
        $this->assertInstanceOf(Currency::class, $this->response->sellingCurrency());
    }

    public function testItCanGetSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->sellingAmount());
        $this->assertEquals(0, $this->response->sellingAmount()->getAmount());
    }

    public function testItCanGetUnutilisedSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->unutilisedSellingAmount());
        $this->assertEquals(0, $this->response->unutilisedSellingAmount()->getAmount());
    }

    public function testItCanGetCustomerId()
    {
        $this->assertEquals(17824872, $this->response->customerId());
    }
}
