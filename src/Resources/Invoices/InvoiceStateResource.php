<?php

namespace ResellerClub\Resources\Invoices;

abstract class InvoiceStateResource
{
    const NO_INVOICE = 'NoInvoice';

    const PAY_INVOICE = 'PayInvoice';

    const KEEP_INVOICE = 'KeepInvoice';

    const ONLY_ADD_INVOICE = 'OnlyAdd';

    public static function validateState(string $state): bool
    {
        switch ($state) {
            case self::NO_INVOICE:
            case self::PAY_INVOICE:
            case self::KEEP_INVOICE:
            case self::ONLY_ADD_INVOICE:
                return true;
            default:
                return false;
        }
    }
}
