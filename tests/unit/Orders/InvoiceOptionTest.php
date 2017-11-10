<?php

namespace ResellerClub\Orders\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\InvoiceOption;

class InvoiceOptionTest extends TestCase
{
    public function testValidStatuses()
    {
        $this->assertEquals('NoInvoice', (string) InvoiceOption::noInvoice());
        $this->assertEquals('PayInvoice', (string) InvoiceOption::payInvoice());
        $this->assertEquals('KeepInvoice', (string) InvoiceOption::keepInvoice());
        $this->assertEquals('OnlyAdd', (string) InvoiceOption::onlyAdd());
    }
}
