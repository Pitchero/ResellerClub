<?php

namespace Tests\Unit\Domains;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\DelegationSigner;

class DelegationSignerTest extends TestCase
{
    /**
     * @var DelegationSigner
     */
    private $delegationSigner;

    protected function setUp(): void
    {
        parent::setUp();
        $this->delegationSigner = new DelegationSigner(
            $keyTag = 'some-key-tag',
            $algorithm = 'RSA-SHA256',
            $digest = 'some-digest',
            $digestType = 'SHA-256'
        );
    }

    public function testKeyTag(): void
    {
        $this->assertEquals('some-key-tag', $this->delegationSigner->keyTag());
    }

    public function testAlgorithm(): void
    {
        $this->assertEquals('RSA-SHA256', $this->delegationSigner->algorithm());
    }

    public function testDigest(): void
    {
        $this->assertEquals('some-digest', $this->delegationSigner->digest());
    }

    public function testDigestType(): void
    {
        $this->assertEquals('SHA-256', $this->delegationSigner->digestType());
    }
}
