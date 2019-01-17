<?php

namespace ResellerClub\Orders;

use ResellerClub\Address;
use ResellerClub\EmailAddress;
use ResellerClub\TelephoneNumber;

class Contact
{
    /**
     * The contact id.
     *
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var string
     */
    private $parentId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * @var TelephoneNumber
     */
    private $telephoneNumber;

    /**
     * @var Address
     */
    private $address;

    /**
     * Contact constructor.
     *
     * @param int $id
     * @param int $customerId
     * @param string $parentId
     * @param string $name
     * @param EmailAddress $email
     * @param TelephoneNumber $telephoneNumber
     * @param Address $address
     */
    public function __construct(
        int $id,
        int $customerId,
        string $parentId,
        string $name,
        EmailAddress $email,
        TelephoneNumber $telephoneNumber,
        Address $address
    ) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->parentId = $parentId;
        $this->name = $name;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->address = $address;
    }

    /**
     * Gets the contact's id.
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * Gets the customer's id.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerId;
    }

    /**
     * Gets the parent id.
     *
     * @return string
     */
    public function parentId(): string
    {
        return $this->parentId;
    }

    /**
     * Gets the contact's name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Gets the email address.
     *
     * @return EmailAddress
     */
    public function email(): EmailAddress
    {
        return $this->email;
    }

    /**
     * Gets the email address.
     *
     * @return TelephoneNumber
     */
    public function telephoneNumber(): TelephoneNumber
    {
        return $this->telephoneNumber;
    }

    /**
     * Gets the address.
     *
     * @return Address
     */
    public function address(): Address
    {
        return $this->address;
    }
}
