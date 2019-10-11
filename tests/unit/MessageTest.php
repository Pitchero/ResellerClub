<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Message;

class MessageTest extends TestCase
{
    public function testMessageReturnsCorrectString(): void
    {
        $this->assertEquals('This is the message', (string) new Message('This is the message'));
    }
}
