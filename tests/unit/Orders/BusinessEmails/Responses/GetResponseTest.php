<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\GetResponse;
use ResellerClub\Orders\OrderStatus;

class GetResponseTest extends TestCase
{
    /**
     * @var GetResponse
     */
    private $response;

    public function testOrderId()
    {
        $this->response = new GetResponse(['orderid' => 123]);

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

    public function testCurrentOrderStatus()
    {
        $this->response = new GetResponse(['currentstatus' => 'Active']);

        $this->assertInstanceOf(OrderStatus::class, $this->response->currentOrderStatus());
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

    public function testEntityId()
    {
        $this->response = new GetResponse(['entityid' => 123]);

        $this->assertInternalType('int', $this->response->entityId());
        $this->assertEquals(123, $this->response->entityId());
    }

    public function testEaqId()
    {
        $this->response = new GetResponse(['eaqid' => 0]);

        $this->assertInternalType('int', $this->response->eaqId());
        $this->assertEquals(0, $this->response->eaqId());
    }

    public function testPaused()
    {
        $this->response = new GetResponse(['paused' => false]);

        $this->assertInternalType('bool', $this->response->paused());
        $this->assertFalse($this->response->paused());
    }

    public function testCustomerCost()
    {
        $this->response = new GetResponse(['customercost' => '0.0']);

        $this->assertInternalType('float', $this->response->customerCost());
        $this->assertEquals('0.00', $this->response->customerCost());
    }

    public function testOrderStatus()
    {
        $this->response = new GetResponse(['orderstatus' => []]);

        $this->assertInternalType('array', $this->response->orderStatus());
    }

    public function testIsRecurring()
    {
        $this->response = new GetResponse(['recurring' => false]);

        $this->assertInternalType('bool', $this->response->isRecurring());
        $this->assertFalse($this->response->isRecurring());
    }

    public function testEntityTypeId()
    {
        $this->response = new GetResponse(['entitytypeid' => 283]);

        $this->assertInternalType('int', $this->response->entityTypeId());
        $this->assertEquals(283, $this->response->entityTypeId());
    }

    public function testDeletionRequest()
    {
        $this->response = new GetResponse(['isDeletionRequest' => false]);

        $this->assertInternalType('bool', $this->response->deletionRequest());
        $this->assertFalse($this->response->deletionRequest());
    }

    public function testResellerCost()
    {
        $this->response = new GetResponse(['resellercost' => 0]);

        $this->assertInternalType('float', $this->response->resellerCost());
        $this->assertEquals('0.00', $this->response->resellerCost());
    }

    public function testJumpConditions()
    {
        $this->response = new GetResponse(['jumpConditions' => []]);

        $this->assertInternalType('array', $this->response->jumpConditions());
    }

    public function testCurrentOrderPrice()
    {
        $this->response = new GetResponse(['currentOrderPrice' => '0.0']);

        $this->assertInternalType('float', $this->response->currentOrderPrice());
        $this->assertEquals('0.00', $this->response->currentOrderPrice());
    }

    public function testActionCompleted()
    {
        $this->response = new GetResponse(['actioncompleted' => '0']);

        $this->assertInternalType('string', $this->response->actionCompleted());
        $this->assertEquals('0', $this->response->actionCompleted());
    }

    public function testMoneyBackPeriod()
    {
        $this->response = new GetResponse(['moneybackperiod' => 30]);

        $this->assertInternalType('int', $this->response->moneyBackPeriod());
        $this->assertEquals(30, $this->response->moneyBackPeriod());
    }
}
