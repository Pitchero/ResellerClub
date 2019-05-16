<?php

namespace ResellerClub;

class Message
{
    /**
     * @var string
     */
    protected $message;

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
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }
}
