<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Config;

class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    private $config;

    public function testAuthUserId()
    {
        $this->assertEquals(123, $this->config->authUserId());
    }

    public function testApiKey()
    {
        $this->assertEquals('api_key', $this->config->apiKey());
    }

    public function testIsNotTestMode()
    {
        $this->assertFalse($this->config->isTestMode());
    }

    public function testIsTestMode()
    {
        $config = new Config(123, 'api_key', true);
        $this->assertTrue($config->isTestMode());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->config = new Config(123, 'api_key');
    }
}
