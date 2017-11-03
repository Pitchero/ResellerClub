<?php

namespace ResellerClub\Orders;

class InvoiceOption
{
    /**
    * @var string
    */
    private $status;

    public static function noInvoice()
    {
        return new self('NoInvoice');
    }

    public static function payInvoice()
    {
        return new self('PayInvoice');
    }

    public static function keepInvoice()
    {
        return new self('KeepInvoice');
    }

    public static function onlyAdd()
    {
        return new self('OnlyAdd');
    }

    public function __toString()
    {
        return $this->status;
    }

    private function __construct(string $status)
    {
        $this->status = $status;
    }
}
