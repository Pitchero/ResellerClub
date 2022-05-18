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

    protected function setUp(): void
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

    public function testOrderId(): void
    {
        $this->assertIsInt($this->request->orderId());
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testCurrentExpiryTimestamp(): void
    {
        $this->assertIsInt($this->request->currentExpiryTimestamp());
        $this->assertEquals($this->currentExpiry->getTimestamp(), $this->request->currentExpiryTimestamp());
    }

    public function testInvoiceOption(): void
    {
        $this->assertInstanceOf(InvoiceOption::class, $this->request->invoiceOption());
        $this->assertEquals((string) $this->invoiceOption, (string) $this->request->invoiceOption());
    }

    public function testYears(): void
    {
        $this->assertIsInt($this->request->years());
        $this->assertEquals(1, $this->request->years());

        $this->request = new RenewRequest(
            $this->order,
            $this->currentExpiry,
            $this->invoiceOption,
            $years = 0,
            $purchasePrivacyProtection = false,
            $autoRenew = false
        );

        $this->assertIsInt($this->request->years());
        $this->assertEquals(0, $this->request->years());
    }

    public function testPurchasePrivacyProtection(): void
    {
        $this->assertIsBool($this->request->purchasePrivacyProtection());
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

    public function testAutoRenew(): void
    {
        $this->assertIsBool($this->request->autoRenew());
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
