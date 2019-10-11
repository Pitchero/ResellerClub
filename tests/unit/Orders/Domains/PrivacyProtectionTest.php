<?php

namespace Tests\Unit\Domains;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\PrivacyProtection;

class PrivacyProtectionTest extends TestCase
{
    /**
     * @var PrivacyProtection
     */
    private $privacyProtection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->privacyProtection = new PrivacyProtection(
            $expiry = '1547565748',
            $registrantContact = 'registrant',
            $adminContact = 'admin',
            $billingContact = 'billing'
        );
    }

    public function testExpiry(): void
    {
        $this->assertInstanceOf(Carbon::class, $this->privacyProtection->expiry());
        $this->assertEquals(
            Carbon::createFromTimestamp('1547565748'),
            $this->privacyProtection->expiry()
        );
    }

    public function testRegistrantContact(): void
    {
        $this->assertEquals('registrant', $this->privacyProtection->registrantContact());
    }

    public function testAdminContact(): void
    {
        $this->assertEquals('admin', $this->privacyProtection->adminContact());
    }

    public function testBillingContact(): void
    {
        $this->assertEquals('billing', $this->privacyProtection->billingContact());
    }
}
