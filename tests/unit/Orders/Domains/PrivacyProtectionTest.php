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

    protected function setUp()
    {
        parent::setUp();
        $this->privacyProtection = new PrivacyProtection(
            $expiry = '1547565748',
            $registrantContact = 'registrant',
            $adminContact = 'admin',
            $billingContact = 'billing'
        );
    }

    public function testExpiry()
    {
        $this->assertInstanceOf(Carbon::class, $this->privacyProtection->expiry());
        $this->assertEquals(
            Carbon::createFromTimestamp('1547565748'),
            $this->privacyProtection->expiry()
        );
    }

    public function testRegistrantContact()
    {
        $this->assertEquals('registrant', $this->privacyProtection->registrantContact());
    }

    public function testAdminContact()
    {
        $this->assertEquals('admin', $this->privacyProtection->adminContact());
    }

    public function testBillingContact()
    {
        $this->assertEquals('billing', $this->privacyProtection->billingContact());
    }
}
