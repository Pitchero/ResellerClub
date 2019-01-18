<?php

namespace ResellerClub\Orders\Domains\Requests;

use Carbon\Carbon;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class RenewRequest
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @var Carbon
     */
    private $currentExpiry;

    /**
     * @var InvoiceOption
     */
    private $invoiceOption;

    /**
     * @var int
     */
    private $years;

    /**
     * @var bool
     */
    private $purchasePrivacyProtection;

    /**
     * @var bool
     */
    private $autoRenew;

    public function __construct(
        Order $order,
        Carbon $currentExpiry,
        InvoiceOption $invoiceOption,
        int $years = 1,
        bool $purchasePrivacyProtection = false,
        bool $autoRenew = false
    ) {
        $this->order = $order;
        $this->currentExpiry = $currentExpiry;
        $this->invoiceOption = $invoiceOption;
        $this->years = $years;
        $this->purchasePrivacyProtection = $purchasePrivacyProtection;
        $this->autoRenew = $autoRenew;
    }

    /**
     * Get the ID of the order to be renewed.
     *
     * @return int
     */
    public function orderId(): int
    {
        return (int) $this->order->id();
    }

    public function currentExpiryTimestamp(): int
    {
        return $this->currentExpiry->getTimestamp();
    }

    /**
     * Get how the customer invoices will be handled.
     *
     * @return InvoiceOption
     */
    public function invoiceOption(): InvoiceOption
    {
        return $this->invoiceOption;
    }

    /**
     * Get the number of years for which the order should be renewed.
     *
     * @return int
     */
    public function years(): int
    {
        return (int) $this->years;
    }

    /**
     * Get whether privacy protection should be purchased when renewing the domain.
     *
     * @return bool
     */
    public function purchasePrivacyProtection(): bool
    {
        return (bool) $this->purchasePrivacyProtection;
    }

    /**
     * Get whether the domain should auto-renew in the future.
     *
     * @return bool
     */
    public function autoRenew(): bool
    {
        return (bool) $this->autoRenew;
    }
}
