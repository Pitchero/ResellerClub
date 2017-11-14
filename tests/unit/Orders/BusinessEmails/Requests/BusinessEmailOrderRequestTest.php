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

    protected function setUp()
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

    public function testCustomerId()
    {
        $customerId = $this->businessEmailOrder->customerId();

        $this->assertInternalType('int', $customerId);
        $this->assertEquals(123, $customerId);
    }

    public function testDomainName()
    {
        $this->assertEquals('some-domain.co.uk', $this->businessEmailOrder->domain());
    }

    public function testNumberOfAccounts()
    {
        $numberOfAccounts = $this->businessEmailOrder->numberOfAccounts();
        $this->assertInternalType('int', $numberOfAccounts);
        $this->assertEquals(5, $numberOfAccounts);
    }

    public function testForNumberOfMonths()
    {
        $forNumberOfMonths = $this->businessEmailOrder->forNumberOfMonths();
        $this->assertInternalType('int', $forNumberOfMonths);
        $this->assertEquals(1, $forNumberOfMonths);
    }

    public function testInvoiceCustomer()
    {
        $this->assertInstanceOf(InvoiceOption::class, $this->businessEmailOrder->invoiceOption());
    }
}
