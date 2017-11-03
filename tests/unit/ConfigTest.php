<?php

namespace ResellerClub\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Config;

class ConfigTest extends TestCase
{
    public function testAuthUserId()
    {
        $this->assertEquals(123, $this->config->authUserId());
    }

    public function testApiKey()
    {
        $this->assertEquals('api_key', $this->config->apiKey());
    }

    public function testUnsetTestMode()
    {
        $this->assertFalse($this->config->testMode());
    }

    public function testSetTestMode()
    {
        $config = new Config(123, 'api_key', true);
        $this->assertTrue($config->testMode());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->config = new Config(123, 'api_key');
    }
}
