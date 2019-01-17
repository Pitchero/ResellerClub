<?php

namespace ResellerClub;

use InvalidArgumentException;

class TelephoneNumber
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var $diallingCode
     */
    private $diallingCode;

    /**
     * Create a new telephone instance.
     *
     * @param string $diallingCode
     * @param string $number
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $diallingCode, string $number)
    {
        $this->diallingCode = $diallingCode;
        $this->number = $number;

    }

    public function diallingCode(): string
    {
        return (string) $this->format($this->diallingCode);
    }

    public function number(): string
    {
        return (string) $this->format($this->number);
    }

    private function format(string $string): string
    {
        return str_replace($this->charactersToReplace(), '', $string);
    }

    /**
     * Array of characters to be stripped out.
     *
     * @return array
     */
    private function charactersToReplace(): array
    {
        return ['+', '_', '-', ' '];
    }
}
