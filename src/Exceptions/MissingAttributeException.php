<?php

namespace ResellerClub\Exceptions;

use RuntimeException;

class MissingAttributeException extends RuntimeException
{
    public function __construct(string $expectedAttribute)
    {
        $message = sprintf("Expected attribute [{$expectedAttribute}] was not in response.");
        parent::__construct($message);
    }
}