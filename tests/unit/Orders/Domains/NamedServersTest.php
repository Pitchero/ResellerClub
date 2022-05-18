<?php

namespace Tests\Unit\Domains;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\NamedServers;

class NamedServersTest extends TestCase
{
    /**
     * @var NamedServers
     */
    private $namedServers;

    protected function setUp(): void
    {
        parent::setUp();
        $this->namedServers = new NamedServers(
            $numberOfNamedServers = 2,
            $ns1 = 'ns1.test.example.com',
            $ns2 = 'ns2.testing.example.com',
            $cns = 'ns3.child-named-server.example.com'
        );
    }

    public function testNumberOfNamedServers(): void
    {
        $this->assertEquals(2, $this->namedServers->numberOfServers());
    }

    public function testNamedServer1(): void
    {
        $this->assertEquals('ns1.test.example.com', $this->namedServers->namedServer1());
    }

    public function testNamedServer2(): void
    {
        $this->assertEquals('ns2.testing.example.com', $this->namedServers->namedServer2());
    }

    public function testChildNamedServer(): void
    {
        $this->assertEquals('ns3.child-named-server.example.com', $this->namedServers->childNamedServer());
    }
}
