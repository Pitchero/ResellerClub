<?php

namespace ResellerClub\Requests\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Exceptions\InvalidInvoiceStateException;
use ResellerClub\Requests\Orders\BusinessEmailOrderRequest;
use ResellerClub\Resources\Invoices\InvoiceStateResource;

class BusinessEmailOrderRequestTest extends TestCase
{
    /**
     * @var BusinessEmailOrderRequest
     */
    private $business_email_order;

    public function testCustomerId()
    {
        $customer_id = $this->business_email_order->customerId();

        $this->assertInternalType('int', $customer_id);
        $this->assertEquals(123, $customer_id);
    }

    public function testDomainName()
    {
        $this->assertEquals('some-domain.co.uk', $this->business_email_order->domain());
    }

    public function testNumberOfAccounts()
    {
        $number_of_accounts = $this->business_email_order->numberOfAccounts();
        $this->assertInternalType('int', $number_of_accounts);
        $this->assertEquals(5, $number_of_accounts);
    }

    public function testForNumberOfMonths()
    {
        $for_number_of_months = $this->business_email_order->forNumberOfMonths();
        $this->assertInternalType('int', $for_number_of_months);
        $this->assertEquals(1, $for_number_of_months);
    }

    public function testInvoiceCustomer()
    {
        $this->assertEquals(InvoiceStateResource::NO_INVOICE, $this->business_email_order->invoiceState());
    }

    public function testInvalidInvoiceStateCausesAnException()
    {
        $this->expectException(InvalidInvoiceStateException::class);

        $this->business_email_order = new BusinessEmailOrderRequest(
            123,
            'some-domain.co.uk',
            5,
            1,
            'not_a_valid_invoice_state'
        );
    }

    protected function setUp()
    {
        parent::setUp();

        $this->business_email_order = new BusinessEmailOrderRequest(
            123,
            'some-domain.co.uk',
            5,
            1,
            InvoiceStateResource::NO_INVOICE
        );
    }
}
