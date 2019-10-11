<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;

class EmailAddressTest extends TestCase
{
    public function testCanCreateNewInstance(): void
    {
        $email = new EmailAddress('steve@apple.com');

        $this->assertEquals('steve@apple.com', (string) $email);
    }

    public function testInvalidEmailAddressThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new EmailAddress('example.com');
    }
}
