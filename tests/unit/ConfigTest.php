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

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new Config(123, 'api_key');
    }

    public function testAuthUserId(): void
    {
        $this->assertEquals(123, $this->config->authUserId());
    }

    public function testApiKey(): void
    {
        $this->assertEquals('api_key', $this->config->apiKey());
    }

    public function testIsNotTestMode(): void
    {
        $this->assertFalse($this->config->isTestMode());
    }

    public function testIsTestMode(): void
    {
        $config = new Config(123, 'api_key', true);
        $this->assertTrue($config->isTestMode());
    }
}
