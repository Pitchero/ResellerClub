<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\TelephoneNumber;

class TelephoneNumberTest extends TestCase
{
    public function testDiallingCode(): void
    {
        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '+44',
            $number = '00000000'
        );

        $this->assertIsString($telephoneNumber->diallingCode());
        $this->assertEquals('44', $telephoneNumber->diallingCode());

        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '44',
            $number = '00000000'
        );

        $this->assertIsString($telephoneNumber->diallingCode());
        $this->assertEquals('44', $telephoneNumber->diallingCode());
    }

    public function testNumber(): void
    {
        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '00',
            $number = '0113 000 0000'
        );

        $this->assertIsString($telephoneNumber->number());
        $this->assertEquals('01130000000', $telephoneNumber->number());

        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '00',
            $number = '0113-000-0000'
        );

        $this->assertIsString($telephoneNumber->number());
        $this->assertEquals('01130000000', $telephoneNumber->number());

        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '00',
            $number = '01130000000'
        );

        $this->assertIsString($telephoneNumber->number());
        $this->assertEquals('01130000000', $telephoneNumber->number());

        $telephoneNumber = new TelephoneNumber(
            $diallingCode = '00',
            $number = '+441130000000'
        );

        $this->assertIsString($telephoneNumber->number());
        $this->assertEquals('441130000000', $telephoneNumber->number());
    }
}
