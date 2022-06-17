<?php

namespace ResellerClub\Orders\EmailAccounts\Requests;

use ResellerClub\EmailAddress;
use ResellerClub\Orders\Order;

class UpdateDetailsRequest
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $notificationEmailAddress;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * UpdateDetails constructor.
     *
     * @param Order $order
     * @param EmailAddress $emailAddress
     * @param EmailAddress $notificationEmailAddress
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(Order $order, EmailAddress $emailAddress, EmailAddress $notificationEmailAddress, string $firstName, string $lastName)
    {
        $this->order = $order;
        $this->emailAddress = $emailAddress;
        $this->notificationEmailAddress = $notificationEmailAddress;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Get the ID of the order.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the email address of the business email account.
     *
     * @return EmailAddress
     */
    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * Get the notification email address of the business email account.
     *
     * @return EmailAddress
     */
    public function notificationEmailAddress(): EmailAddress
    {
        return $this->notificationEmailAddress;
    }

    /**
     * Get the first name of the business email account.
     *
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * Get the last name of the business email account.
     *
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }
}