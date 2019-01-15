<?php

namespace Tests\Unit\Domains;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\DelegationSigner;
use ResellerClub\Orders\Domains\NamedServers;

class DelegationSignerTest extends TestCase
{
    /**
     * @var DelegationSigner
     */
    private $delegationSigner;

    protected function setUp()
    {
        parent::setUp();
        $this->delegationSigner = new DelegationSigner(
            $keyTag = 'some-key-tag',
            $algorithm = 'RSA-SHA256',
            $digest = 'some-digest',
            $digestType = 'SHA-256'
        );
    }

    public function testKeyTag()
    {
        $this->assertEquals('some-key-tag', $this->delegationSigner->keyTag());
    }

    public function testAlgorithm()
    {
        $this->assertEquals('RSA-SHA256', $this->delegationSigner->algorithm());
    }

    public function testDigest()
    {
        $this->assertEquals('some-digest', $this->delegationSigner->digest());
    }

    public function testDigestType()
    {
        $this->assertEquals('SHA-256', $this->delegationSigner->digestType());
    }
}
