<?php

namespace ResellerClub\Exceptions;

use RuntimeException;
use Throwable;

class ApiException extends RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
