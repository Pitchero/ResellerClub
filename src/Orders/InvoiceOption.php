<?php

namespace ResellerClub\Orders;

class InvoiceOption
{
    /**
     * @var string
     */
    private $status;

    /**
     * Create an invoice option instance with the “no invoice” status.
     *
     * @return self
     */
    public static function noInvoice()
    {
        return new self('NoInvoice');
    }

    /**
     * Create an invoice option instance with the “pay invoice” status.
     *
     * @return self
     */
    public static function payInvoice()
    {
        return new self('PayInvoice');
    }

    /**
     * Create an invoice option instance with the “keep invoice” status.
     *
     * @return self
     */
    public static function keepInvoice()
    {
        return new self('KeepInvoice');
    }

    /**
     * Create an invoice option instance with the “only add” status.
     *
     * @return self
     */
    public static function onlyAdd()
    {
        return new self('OnlyAdd');
    }

    /**
     * Get the string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->status;
    }

    /**
     * Create a new invoice option instance.
     *
     * @param string $status
     *
     * @return self
     */
    private function __construct(string $status)
    {
        $this->status = $status;
    }
}
