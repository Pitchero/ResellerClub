<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\InvoiceOption;

class InvoiceOptionTest extends TestCase
{
    public function testValidStatuses(): void
    {
        $this->assertEquals('NoInvoice', (string) InvoiceOption::noInvoice());
        $this->assertEquals('PayInvoice', (string) InvoiceOption::payInvoice());
        $this->assertEquals('KeepInvoice', (string) InvoiceOption::keepInvoice());
        $this->assertEquals('OnlyAdd', (string) InvoiceOption::onlyAdd());
    }
}
