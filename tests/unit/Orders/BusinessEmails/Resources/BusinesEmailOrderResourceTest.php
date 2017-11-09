<?php

namespace ResellerClub\Orders\BusinessEmails\Resources\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Action;
use ResellerClub\Orders\BusinessEmails\Resources\BusinessEmailOrderResource;

class BusinessEmailOrderResourceTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->resource = new BusinessEmailOrderResource([
            'description' => 'some-domain.co.in',
            'entityid' => 1234,
            'eaqid' => 461331388,
            'actiontype' => 'Add',
            'actiontypedesc' => 'Addition of Business Email 1 for testdomainmail.com for 1 month',
            'actionstatus' => 'PendingExecution',
            'actionstatusdesc' => 'The action is pending execution',
        ]);
    }

    public function testItCanGetDomain()
    {
        $this->assertEquals('some-domain.co.in', $this->resource->domain());
    }

    public function testItCanGetOrderId()
    {
        $this->assertEquals(1234, $this->resource->orderId());
    }

    public function testItCanGetAction()
    {
        $this->assertInstanceOf(Action::class, $this->resource->action());
    }
}
