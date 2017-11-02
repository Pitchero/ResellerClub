<?php

namespace ResellerClub\Resources\Orders\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Invoices\Invoice;

class InvoiceTest extends TestCase
{
    public function testNoInvoice()
    {
        $invoice = new Invoice('no_invoice');
        $this->assertEquals('NoInvoice', $invoice->paymentState());
    }

    public function testPayInvoice()
    {
        $invoice = new Invoice('pay_invoice');
        $this->assertEquals('PayInvoice', $invoice->paymentState());
    }

    public function testKeepInvoice()
    {
        $invoice = new Invoice('keep_invoice');
        $this->assertEquals('KeepInvoice', $invoice->paymentState());
    }

    public function testOnlyAddInvoice()
    {
        $invoice = new Invoice('only_add_invoice');
        $this->assertEquals('OnlyAdd', $invoice->paymentState());
    }

    public function testInvalidPaymentState()
    {
        try {
            new Invoice('invalid_invoice_state');
        } catch (Exception $e) {
            $this->assertEquals('Invalid invoice state [invalid_invoice_state]', $e->getMessage());
        }
    }
}
