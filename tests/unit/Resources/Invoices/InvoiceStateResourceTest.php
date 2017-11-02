<?php

namespace ResellerClub\Resources\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Resources\Invoices\InvoiceStateResource;

class InvoiceStateResourceTest extends TestCase
{
    public function testNoInvoice()
    {
        $this->assertEquals('NoInvoice', InvoiceStateResource::NO_INVOICE);
    }

    public function testValidateStateNoInvoice()
    {
        $this->assertTrue(InvoiceStateResource::validateState('NoInvoice'));
    }

    public function testPayInvoice()
    {
        $this->assertEquals('PayInvoice', InvoiceStateResource::PAY_INVOICE);
    }

    public function testValidateStatePayInvoice()
    {
        $this->assertTrue(InvoiceStateResource::validateState('PayInvoice'));
    }

    public function testKeepInvoice()
    {
        $this->assertEquals('KeepInvoice', InvoiceStateResource::KEEP_INVOICE);
    }

    public function testValidateStateKeepInvoice()
    {
        $this->assertTrue(InvoiceStateResource::validateState('KeepInvoice'));
    }

    public function testOnlyAddInvoice()
    {
        $this->assertEquals('OnlyAdd', InvoiceStateResource::ONLY_ADD_INVOICE);
    }

    public function testValidateStateOnlyAdd()
    {
        $this->assertTrue(InvoiceStateResource::validateState('OnlyAdd'));
    }

    public function testValidateStateInvalidState()
    {
        $this->assertFalse(InvoiceStateResource::validateState('not_a_valid_state'));
    }
}
