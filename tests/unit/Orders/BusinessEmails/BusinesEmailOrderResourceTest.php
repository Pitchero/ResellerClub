<?php

namespace ResellerClub\Orders\BusinessEmails\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrderResource;

class BusinessEmailOrderResourceTest extends TestCase
{
    public function testDomain()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['description' => 'some-domain.co.in']
        );

        $this->assertEquals('some-domain.co.in', $business_email_order_resource->domain());
    }

    public function testOrderId()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['entityid' => 1234]
        );

        $this->assertEquals(1234, $business_email_order_resource->orderId());
    }

    public function testActionType()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['actiontype' => 'Add']
        );

        $this->assertEquals('Add', $business_email_order_resource->actionType());
    }

    public function description()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['actiontypedesc' => 'Addition of Business Email 1 for testdomainmail.com for 1 month']
        );

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
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['actionstatus' => 'PendingExecution']
        );

        $this->assertEquals('PendingExecution', $business_email_order_resource->actionStatus());
    }

    public function testActionStatusDescription()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['actionstatusdesc' => 'The action is pending execution']
        );

        $this->assertEquals(
            'The action is pending execution',
            $business_email_order_resource->actionStatusDescription()
        );
    }

    public function testInvoiceId()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['invoiceid' => 77433277]
        );

        $this->assertEquals(77433277, $business_email_order_resource->invoiceId());
    }

    public function testSellingCurrency()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['sellingcurrencysymbol' => '£']
        );

        $this->assertEquals('£', $business_email_order_resource->sellingCurrency());
    }

    public function testSellingAmount()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['sellingamount' => '1.25']
        );

        $this->assertEquals('1.25', $business_email_order_resource->sellingAmount());
    }

    public function testTransactionAmount()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['unutilisedsellingamount' => '1.00']
        );

        $this->assertEquals('1.00', $business_email_order_resource->transactionAmount());
    }

    public function testCustomerId()
    {
        $business_email_order_resource = new BusinessEmailOrderResource(
            ['customerid' => 17824872]
        );

        $this->assertEquals(17824872, $business_email_order_resource->customerId());
    }



}
