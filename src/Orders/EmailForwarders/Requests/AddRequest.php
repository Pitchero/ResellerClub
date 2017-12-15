<?php

namespace ResellerClub\Orders\EmailForwarders\Requests;

use InvalidArgumentException;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\Order;

class AddRequest
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var EmailAddress
     */
    protected $email;

    /**
     * @var array
     */
    protected $forwarders = [];

    /**
     * Create a new email forwarded request.
     *
     * @param Order        $order
     * @param EmailAddress $email
     */
    public function __construct(Order $order, EmailAddress $email)
    {
        $this->order = $order;
        $this->email = $email;
    }

    /**
     * Get the ID for this order.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the email address to forward.
     *
     * @return EmailAddress
     */
    public function email(): EmailAddress
    {
        return $this->email;
    }

    /**
     * Set the forwarding email addresses.
     *
     * @param array $forwarders
     *
     * @throws InvalidArgumentException
     *
     * @return $this
     */
    public function setForwarders(array $forwarders)
    {
        // Assert each element in array is an EmailAddress instance
        foreach ($forwarders as $forwarder) {
            if (!($forwarder instanceof EmailAddress)) {
                throw new InvalidArgumentException(
                    sprintf('Forwarder should be an instance of %s.', EmailAddress::class)
                );
            }
        }

        $this->forwarders = $forwarders;

        return $this;
    }

    /**
     * Get the forwarding email addresses.
     *
     * @return string
     */
    public function forwarders(): string
    {
        return implode(',', array_map('strval', $this->forwarders));
    }
}
