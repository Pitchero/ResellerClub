<?php

namespace Tests\Unit\Orders\BusinessEmails\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Requests\RenewRequest;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class RenewRequestTest extends TestCase
{
    /**
     * @var RenewRequest
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();

        $order = new Order(123);

        $invoiceOption = InvoiceOption::noInvoice();

        $this->request = new RenewRequest(
            $order,
            $months = 3,
            $numberOfAccounts = 0,
            $invoiceOption
        );
    }

    public function testItCanGetOrderId(): void
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testItCanGetMonths(): void
    {
        $this->assertEquals(3, $this->request->months());
    }

    public function testItCanGetNumberOfAccounts(): void
    {
        $this->assertEquals(0, $this->request->numberOfAccounts());
    }

    public function testItCanGetInvoiceOption(): void
    {
        $this->assertInstanceOf(InvoiceOption::class, $this->request->invoiceOption());
        $this->assertEquals('NoInvoice', (string) $this->request->invoiceOption());
    }
}
