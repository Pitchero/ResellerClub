<?php

namespace Tests\Unit\Orders\Domains\Requests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\Requests\RenewRequest;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class RenewRequestTest extends TestCase
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @var Carbon
     */
    private $currentExpiry;

    private $invoiceOption;

    /**
     * @var RenewRequest
     */
    private $request;

    protected function setUp()
    {
        parent::setUp();

        $this->order = new Order(123);
        $this->currentExpiry = new Carbon();
        $this->invoiceOption = InvoiceOption::noInvoice();

        $this->request = new RenewRequest(
            $this->order,
            $this->currentExpiry,
            $this->invoiceOption,
            $years = 1,
            $purchasePrivacyProtection = false,
            $autoRenew = false
        );
    }

    public function testOrderId()
    {
        $this->assertInternalType('int', $this->request->orderId());
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testCurrentExpiryTimestamp()
    {
        $this->assertInternalType('int', $this->request->currentExpiryTimestamp());
        $this->assertEquals($this->currentExpiry->getTimestamp(), $this->request->currentExpiryTimestamp());
    }

    public function testInvoiceOption()
    {
        $this->assertInstanceOf(InvoiceOption::class, $this->request->invoiceOption());
        $this->assertEquals((string) $this->invoiceOption, (string) $this->request->invoiceOption());
    }

    public function testYears()
    {
        $this->assertInternalType('int', $this->request->years());
        $this->assertEquals(1, $this->request->years());

        $this->request = new RenewRequest(
            $this->order,
            $this->currentExpiry,
            $this->invoiceOption,
            $years = 0,
            $purchasePrivacyProtection = false,
            $autoRenew = false
        );

        $this->assertInternalType('int', $this->request->years());
        $this->assertEquals(0, $this->request->years());
    }

    public function testPurchasePrivacyProtection()
    {
        $this->assertInternalType('bool', $this->request->purchasePrivacyProtection());
        $this->assertFalse($this->request->purchasePrivacyProtection());

        $this->request = new RenewRequest(
            $this->order,
            $this->currentExpiry,
            $this->invoiceOption,
            $years = 0,
            $purchasePrivacyProtection = true,
            $autoRenew = false
        );

        $this->assertTrue($this->request->purchasePrivacyProtection());
    }

    public function testAutoRenew()
    {
        $this->assertInternalType('bool', $this->request->autoRenew());
        $this->assertFalse($this->request->autoRenew());

        $this->request = new RenewRequest(
            $this->order,
            $this->currentExpiry,
            $this->invoiceOption,
            $years = 0,
            $purchasePrivacyProtection = false,
            $autoRenew = true
        );

        $this->assertTrue($this->request->autoRenew());
    }
}
