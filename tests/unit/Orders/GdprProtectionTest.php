<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\GdprProtection;

class GdprProtectionTest extends TestCase
{
    public function testEnabledAndDisabled()
    {
        $this->assertTrue(
            (new GdprProtection(
                $enabled = true,
                $eligibility = false
            ))->enabled()
        );

        $this->assertTrue(
            (new GdprProtection(
                $enabled = true,
                $eligibility = true
            ))->enabled()
        );

        $this->assertFalse(
            (new GdprProtection(
                $enabled = false,
                $eligibility = true
            ))->enabled()
        );

        $this->assertFalse(
            (new GdprProtection(
                $enabled = false,
                $eligibility = false
            ))->enabled()
        );
    }

    public function testEligibility()
    {
        $this->assertTrue(
            (new GdprProtection(
                $enabled = true,
                $eligibility = true
            ))->eligible()
        );

        $this->assertTrue(
            (new GdprProtection(
                $enabled = false,
                $eligibility = true
            ))->eligible()
        );

        $this->assertFalse(
            (new GdprProtection(
                $enabled = true,
                $eligibility = false
            ))->eligible()
        );

        $this->assertFalse(
            (new GdprProtection(
                $enabled = false,
                $eligibility = false
            ))->eligible()
        );
    }
}
