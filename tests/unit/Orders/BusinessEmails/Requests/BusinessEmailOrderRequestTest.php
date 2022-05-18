<?php

namespace Tests\Unit\Orders\BusinessEmails\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Requests\BusinessEmailOrderRequest;
use ResellerClub\Orders\InvoiceOption;

class BusinessEmailOrderRequestTest extends TestCase
{
    /**
     * @var BusinessEmailOrderRequest
     */
    private $businessEmailOrder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->businessEmailOrder = new BusinessEmailOrderRequest(
            123,
            'some-domain.co.uk',
            5,
            1,
            InvoiceOption::noInvoice()
        );
    }

    public function testCustomerId(): void
    {
        $customerId = $this->businessEmailOrder->customerId();

        $this->assertIsInt($customerId);
        $this->assertEquals(123, $customerId);
    }

    public function testDomainName(): void
    {
        $this->assertEquals('some-domain.co.uk', $this->businessEmailOrder->domain());
    }

    public function testNumberOfAccounts(): void
    {
        $numberOfAccounts = $this->businessEmailOrder->numberOfAccounts();
        $this->assertIsInt($numberOfAccounts);
        $this->assertEquals(5, $numberOfAccounts);
    }

    public function testForNumberOfMonths(): void
    {
        $forNumberOfMonths = $this->businessEmailOrder->forNumberOfMonths();
        $this->assertIsInt($forNumberOfMonths);
        $this->assertEquals(1, $forNumberOfMonths);
    }

    public function testInvoiceCustomer()
    {
        $this->assertInstanceOf(InvoiceOption::class, $this->businessEmailOrder->invoiceOption());
    }
}
