<?php

namespace ResellerClub\Resources\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Invoices\InvoiceState;

class InvoiceStateTest extends TestCase
{
    public function testNoInvoice()
    {
        $this->assertEquals('NoInvoice', InvoiceState::NO_INVOICE);
    }

    public function testPayInvoice()
    {
        $this->assertEquals('PayInvoice', InvoiceState::PAY_INVOICE);
    }

    public function testKeepInvoice()
    {
        $this->assertEquals('KeepInvoice', InvoiceState::KEEP_INVOICE);
    }

    public function testOnlyAddInvoice()
    {
        $this->assertEquals('OnlyAdd', InvoiceState::ONLY_ADD_INVOICE);
    }
}
