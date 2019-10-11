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

    protected function setUp(): void
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

    public function testFeatureNotAvailableExceptionThrown(): void
    {
        $this->expectException(FeatureNotAvailableException::class);

        new PrivacyProtectionOrderResponse([
            'entityid' => '85575828',
            'status'   => 'error',
            'error'    => 'Privacy Protection Service not available.',
        ]);
    }

    public function testItCanOrderId(): void
    {
        $this->assertEquals(85575828, $this->response->orderId());
    }

    public function testItCanGetDescription(): void
    {
        $this->assertEquals('wibble-wibble.net', $this->response->description());
    }

    public function testItCanGetAction(): void
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

    public function testItCanGetInvoiceId(): void
    {
        $this->assertEquals(88768089, $this->response->invoiceId());
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
        $this->assertEquals(0, $this->response->sellingAmount()->getAmount());
    }

    public function testItCanGetUnutilisedSellingAmount(): void
    {
        $this->assertInstanceOf(Money::class, $this->response->unutilisedSellingAmount());
        $this->assertEquals(0, $this->response->unutilisedSellingAmount()->getAmount());
    }

    public function testItCanGetCustomerId(): void
    {
        $this->assertEquals(17824872, $this->response->customerId());
    }
}
