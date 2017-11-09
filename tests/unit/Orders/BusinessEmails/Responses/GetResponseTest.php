<?php

namespace Tests\Unit\Orders\BusinessEmails\Resources;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\GetResponse;

class GetResponseTest extends TestCase
{
    /**
     * @var GetResponse
     */
    private $response;

    public function testOrderId()
    {
        $this->response = new GetResponse(['entityid' => 123]);

        $this->assertInternalType('int', $this->response->orderId());
        $this->assertEquals(123, $this->response->orderId());
    }


    public function testOrderDescription()
    {
        $this->response = new GetResponse(['description' => 'name.onlyfordemo.com']);

        $this->assertInternalType('string', $this->response->orderDescription());
        $this->assertEquals('name.onlyfordemo.com', $this->response->orderDescription());
    }

    public function testOrderCreationDate()
    {
        $this->response = new GetResponse(['creationtime' => '1510142454']);

        $this->assertInstanceOf(Carbon::class, $this->response->orderCreationDate());
    }

    public function testOrderSuspendedAtExpiry()
    {
        $this->response = new GetResponse(['isOrderSuspendedUponExpiry' => true]);

        $this->assertInternalType('bool', $this->response->orderSuspendedAtExpiry());
        $this->assertTrue($this->response->orderSuspendedAtExpiry());
    }

    public function testOrderSuspendedByParent()
    {
        $this->response = new GetResponse(['orderSuspendedByParent' => true]);

        $this->assertInternalType('bool', $this->response->orderSuspendedByParent());
        $this->assertTrue($this->response->orderSuspendedByParent());
    }

    public function testOrderDeletionAllowed()
    {
        $this->response = new GetResponse(['allowdeletion' => true]);

        $this->assertInternalType('bool', $this->response->orderDeletionAllowed());
        $this->assertTrue($this->response->orderDeletionAllowed());
    }

    public function testOrderStatus()
    {
        $this->response = new GetResponse(['currentstatus' => 'Active']);

        $this->assertInternalType('string', $this->response->orderStatus());
        $this->assertEquals('Active', $this->response->orderStatus());
    }

    public function testDomain()
    {
        $this->response = new GetResponse(['domainname' => 'name.onlyfordemo.com']);

        $this->assertInternalType('string', $this->response->domain());
        $this->assertEquals('name.onlyfordemo.com', $this->response->domain());
    }

    public function testExpiry()
    {
        $this->response = new GetResponse(['endtime' => '1512734454']);

        $this->assertInstanceOf(Carbon::class, $this->response->expiry());
    }

    public function testIsImmediateReseller()
    {
        $this->response = new GetResponse(['isImmediateReseller' => true]);

        $this->assertInternalType('bool', $this->response->isImmediateReseller());
        $this->assertTrue($this->response->isImmediateReseller());
    }

    public function testResellerParentId()
    {
        $this->response = new GetResponse(['parentkey' => '999999999_999999998_715226']);

        $this->assertInternalType('string', $this->response->resellerParentId());
        $this->assertEquals('999999999_999999998_715226', $this->response->resellerParentId());
    }

    public function testCustomerId()
    {
        $this->response = new GetResponse(['customerid' => '17824872']);

        $this->assertInternalType('int', $this->response->customerId());
        $this->assertEquals(17824872, $this->response->customerId());
    }

    public function testNumberOfEmailAccounts()
    {
        $this->response = new GetResponse(['emailaccounts' => 5]);

        $this->assertInternalType('int', $this->response->numberOfEmailAccounts());
        $this->assertEquals(5, $this->response->numberOfEmailAccounts());
    }

    public function testProductId()
    {
        $this->response = new GetResponse(['productkey' => 'eeliteus']);

        $this->assertInternalType('string', $this->response->productId());
        $this->assertEquals('eeliteus', $this->response->productId());
    }

    public function testProductCategory()
    {
        $this->response = new GetResponse(['productcategory' => 'hosting']);

        $this->assertInternalType('string', $this->response->productCategory());
        $this->assertEquals('hosting', $this->response->productCategory());
    }
}
