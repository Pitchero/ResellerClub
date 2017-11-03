<?php

namespace ResellerClub\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;

class ApiTest extends TestCase
{
    public function testPost()
    {
        $this->api->post('post', ['request-param' => 123]);
    }

    public function testBusinessEmailOrder()
    {
        $this->assertInstanceOf(BusinessEmailOrder::class, $this->api->businessEmailOrder());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->api = new Api(new Config(123, 'api_key', true));
    }
}
