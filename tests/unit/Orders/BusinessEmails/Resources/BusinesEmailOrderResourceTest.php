<?php

namespace ResellerClub\Orders\BusinessEmails\Resources\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Resources\BusinessEmailOrderResource;

class BusinessEmailOrderResourceTest extends TestCase
{
    public function testDomain()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'description' => 'some-domain.co.in'
        ]);

        $this->assertEquals('some-domain.co.in', $business_email_order_resource->domain());
    }

    public function testOrderId()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'entityid' => 1234
        ]);

        $this->assertEquals(1234, $business_email_order_resource->orderId());
    }

    public function testActionType()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'actiontype' => 'Add'
        ]);

        $this->assertEquals('Add', $business_email_order_resource->actionType());
    }

    public function description()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'actiontypedesc' => 'Addition of Business Email 1 for testdomainmail.com for 1 month'
        ]);

        $this->assertEquals(
            'Addition of Business Email 1 for testdomainmail.com for 1 month',
            $business_email_order_resource->description()
        );
    }

    public function testActionId()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['eaqid' => 461331388]
        );

        $this->assertEquals(461331388, $business_email_order_resource->actionId());
    }

    public function testActionStatus()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'actionstatus' => 'PendingExecution'
        ]);

        $this->assertEquals('PendingExecution', $business_email_order_resource->actionStatus());
    }

    public function testActionStatusDescription()
    {
        $business_email_order_resource = new BusinessEmailOrderResource([
            'actionstatusdesc' => 'The action is pending execution'
        ]);

        $this->assertEquals(
            'The action is pending execution',
            $business_email_order_resource->actionStatusDescription()
        );
    }
}
