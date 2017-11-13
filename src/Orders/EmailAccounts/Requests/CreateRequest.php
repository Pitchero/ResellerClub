<?php

namespace ResellerClub\Orders\EmailAccounts\Requests;

use ResellerClub\Orders\Order;

class CreateRequest
{

    /**
     * ID of the order.
     *
     * @var Order $order
     */
    private $order;

    /**
     * Desired email address for the email account.
     *
     * @var string $email
     */
    private $email;

    /**
     * Password for the email account.
     *
     * @var string $password
     */
    private $password;

    /**
     * Notifications email for the email account.
     *
     * @var string $notificationsEmail
     */
    private $notificationsEmail;

    /**
     * User's first name for the email account.
     *
     * @var string $firstName
     */
    private $firstName;

    /**
     * User's first name for the email account.
     *
     * @var string $lastName
     */
    private $lastName;

    /**
     * Country code for the email account.
     *
     * @var string $countryCode
     */
    private $countryCode;

    /**
     * Language code for the email account.
     *
     * @var string $languageCode
     */
    private $languageCode;

    /**
     * CreateRequest constructor.
     * @param Order $order
     * @param string $email
     * @param string $password
     * @param string $notificationsEmail
     * @param string $firstName
     * @param string $lastName
     * @param string $countryCode
     * @param string $languageCode
     */
    public function __construct(
        Order $order,
        string $email,
        string $password,
        string $notificationsEmail,
        string $firstName,
        string $lastName,
        string $countryCode,
        string $languageCode
    ) {
        $this->order = $order;
        $this->email = $email;
        $this->password = $password;
        $this->notificationsEmail = $notificationsEmail;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->countryCode = $countryCode;
        $this->languageCode = $languageCode;
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
     * Gets the desired email address for the email account.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * Gets the password for the email account.
     *
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * Gets the notifications email for the email account.
     *
     * @return string
     */
    public function notificationsEmail(): string
    {
        return $this->notificationsEmail;
    }

    /**
     * Gets the user's first name for the email account.
     *
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * Gets the user's last name for the email account.
     *
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * Gets the country code for the email account.
     *
     * @return string
     */
    public function countryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Gets the language code for the email account.
     *
     * @return string
     */
    public function languageCode(): string
    {
        return $this->languageCode;
    }
}
