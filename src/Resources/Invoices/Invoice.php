<?php

namespace ResellerClub\Resources\Invoices;

use Exception;

class Invoice
{
    /**
     * @var string
     */
    private $payment_state;

    public function __construct(string $invoice_state)
    {
        $this->payment_state = $this->invoicePaymentState($invoice_state);
    }

    public function paymentState(): string
    {
        return (string) $this->payment_state;
    }

    /**
     * @throws Exception
     */
    private function invoicePaymentState(string $invoice_state)
    {
        $invoice_states = $this->validInvoiceStates();

        if (!array_key_exists($invoice_state, $invoice_states)) {
            throw new Exception('Invalid invoice state [' . $invoice_state . ']');
        }

        return $invoice_states[$invoice_state];
    }

    private function validInvoiceStates()
    {
        return [
            'no_invoice' => 'NoInvoice',
            'pay_invoice' => 'PayInvoice',
            'keep_invoice' => 'KeepInvoice',
            'only_add_invoice' => 'OnlyAdd',
        ];
    }
}
