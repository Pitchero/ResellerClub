<?php

namespace ResellerClub\Orders;

class Contact
{
    /**
     * The contact id.
     *
     * @var int
     */
    private $id;

    /**
     * The contact details.
     *
     * @var string
     */
    private $detail;

    /**
     * Contact constructor.
     *
     * @param int $id
     * @param string $detail
     */
    public function __construct(int $id, string $detail)
    {
        $this->id = $id;
        $this->detail = $detail;
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
     * Gets the contact's detail.
     *
     * @return string
     */
    public function detail(): string
    {
        return $this->detail;
    }
}
