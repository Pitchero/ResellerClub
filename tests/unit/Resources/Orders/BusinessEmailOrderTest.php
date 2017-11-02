<?php

namespace ResellerClub\Resources\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Invoices\Invoice;
use ResellerClub\Resources\Customers\Customer;
use ResellerClub\Resources\Orders\BusinessEmailOrder;

class BusinessEmailOrderTest extends TestCase
{
    /**
     * @var BusinessEmailOrder
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
        $this->assertNull($this->business_email_order->domain());
        $this->business_email_order->setDomain('some-domain.co.uk');
        $this->assertEquals('some-domain.co.uk', $this->business_email_order->domain());
    }

    public function testNumberOfAccounts()
    {
        $pre_assert_number_of_accounts = $this->business_email_order->numberOfAccounts();
        $this->assertInternalType('int', $pre_assert_number_of_accounts);
        $this->assertEquals(0, $pre_assert_number_of_accounts);

        $this->business_email_order->setNumberOfAccounts(5);

        $number_of_accounts = $this->business_email_order->numberOfAccounts();
        $this->assertInternalType('int', $number_of_accounts);
        $this->assertEquals(5, $number_of_accounts);
    }

    public function testForNumberOfMonths()
    {
        $pre_assert_for_number_of_months = $this->business_email_order->forNumberOfMonths();
        $this->assertInternalType('int', $pre_assert_for_number_of_months);
        $this->assertEquals(0, $pre_assert_for_number_of_months);

        $this->business_email_order->setForNumberOfMonths(1);

        $for_number_of_months = $this->business_email_order->forNumberOfMonths();
        $this->assertInternalType('int', $for_number_of_months);
        $this->assertEquals(1, $for_number_of_months);
    }

    public function testInvoiceCustomer()
    {
        $invoice = new Invoice('no_invoice');
        $this->assertInstanceOf(Invoice::class, $this->business_email_order->invoice());
        $this->assertEquals($invoice->paymentState(), $this->business_email_order->invoice()->paymentState());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->business_email_order = new BusinessEmailOrder(
            new Customer(123),
            new Invoice('no_invoice')
        );
    }
}
