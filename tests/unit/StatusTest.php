<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Status;

class StatusTest extends TestCase
{
    public function testStatus(): void
    {
        $this->assertEquals('success', (string) new Status('Success'));
        $this->assertEquals('success', (string) new Status('SUCCESS'));
        $this->assertEquals('success', (string) new Status('success'));
    }
}
