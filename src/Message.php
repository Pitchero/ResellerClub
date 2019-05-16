<?php

namespace ResellerClub;

class Message
{
    /**
     * @var string
     */
    private $message;

    /**
     * Create a new message.
     *
     * @param string
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get a string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }
}
