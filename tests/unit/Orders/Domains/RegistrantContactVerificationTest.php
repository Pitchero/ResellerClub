<?php

namespace Tests\Unit\Domains;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\RegistrantContactVerification;

class RegistrantContactVerificationTest extends TestCase
{
    /**
     * @var RegistrantContactVerification
     */
    private $pendingVerification;

    /**
     * @var RegistrantContactVerification
     */
    private $verified;

    protected function setUp()
    {
        parent::setUp();

        $this->pendingVerification = new RegistrantContactVerification(
            $status = 'Pending',
            $verificationProcessStartTime = 1547563773
        );

        $this->verified = new RegistrantContactVerification(
            $status = 'Verified',
            $verificationProcessStartTime = null
        );
    }

    public function testVerificationStatus()
    {
        $this->assertEquals('Pending', $this->pendingVerification->status());
        $this->assertEquals('Verified', $this->verified->status());
    }

    public function testVerificationProcessStartTimeWhenSet()
    {
        $this->assertInstanceOf(
            Carbon::class,
            $this->pendingVerification->verificationProcessStartTime()
        );

        $this->assertEquals(
            Carbon::createFromTimestamp(1547563773),
            $this->pendingVerification->verificationProcessStartTime()
        );
    }

    public function testVerificationProcessStartTimeWhenNotSet()
    {
        $this->assertNull(
            $this->verified->verificationProcessStartTime()
        );
    }
}
