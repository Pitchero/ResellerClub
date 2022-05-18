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

    public function testOrderId(): void
    {
        $this->response = new GetResponse(['orderid' => 123]);

        $this->assertIsInt($this->response->orderId());
        $this->assertEquals(123, $this->response->orderId());
    }

    public function testOrderDescription(): void
    {
        $this->response = new GetResponse(['description' => 'name.onlyfordemo.com']);

        $this->assertIsString($this->response->orderDescription());
        $this->assertEquals('name.onlyfordemo.com', $this->response->orderDescription());
    }

    public function testOrderCreationDate(): void
    {
        $this->response = new GetResponse(['creationtime' => '1510142454']);

        $this->assertInstanceOf(Carbon::class, $this->response->orderCreationDate());
    }

    public function testOrderSuspendedAtExpiry(): void
    {
        $this->response = new GetResponse(['isOrderSuspendedUponExpiry' => true]);

        $this->assertIsBool($this->response->orderSuspendedAtExpiry());
        $this->assertTrue($this->response->orderSuspendedAtExpiry());
    }

    public function testOrderSuspendedByParent(): void
    {
        $this->response = new GetResponse(['orderSuspendedByParent' => true]);

        $this->assertIsBool($this->response->orderSuspendedByParent());
        $this->assertTrue($this->response->orderSuspendedByParent());
    }

    public function testOrderDeletionAllowed(): void
    {
        $this->response = new GetResponse(['allowdeletion' => true]);

        $this->assertIsBool($this->response->orderDeletionAllowed());
        $this->assertTrue($this->response->orderDeletionAllowed());
    }

    public function testCurrentOrderStatus(): void
    {
        $this->response = new GetResponse(['currentstatus' => 'Active']);

        $this->assertInstanceOf(OrderStatus::class, $this->response->currentOrderStatus());
    }

    public function testDomain(): void
    {
        $this->response = new GetResponse(['domainname' => 'name.onlyfordemo.com']);

        $this->assertIsString($this->response->domain());
        $this->assertEquals('name.onlyfordemo.com', $this->response->domain());
    }

    public function testExpiry(): void
    {
        $this->response = new GetResponse(['endtime' => '1512734454']);

        $this->assertInstanceOf(Carbon::class, $this->response->expiry());
    }

    public function testIsImmediateReseller(): void
    {
        $this->response = new GetResponse(['isImmediateReseller' => true]);

        $this->assertIsBool($this->response->isImmediateReseller());
        $this->assertTrue($this->response->isImmediateReseller());
    }

    public function testResellerParentId(): void
    {
        $this->response = new GetResponse(['parentkey' => '999999999_999999998_715226']);

        $this->assertIsString($this->response->resellerParentId());
        $this->assertEquals('999999999_999999998_715226', $this->response->resellerParentId());
    }

    public function testCustomerId(): void
    {
        $this->response = new GetResponse(['customerid' => '17824872']);

        $this->assertIsInt($this->response->customerId());
        $this->assertEquals(17824872, $this->response->customerId());
    }

    public function testNumberOfEmailAccounts(): void
    {
        $this->response = new GetResponse(['emailaccounts' => 5]);

        $this->assertIsInt($this->response->numberOfEmailAccounts());
        $this->assertEquals(5, $this->response->numberOfEmailAccounts());
    }

    public function testProductId(): void
    {
        $this->response = new GetResponse(['productkey' => 'eeliteus']);

        $this->assertIsString($this->response->productId());
        $this->assertEquals('eeliteus', $this->response->productId());
    }

    public function testProductCategory(): void
    {
        $this->response = new GetResponse(['productcategory' => 'hosting']);

        $this->assertIsString($this->response->productCategory());
        $this->assertEquals('hosting', $this->response->productCategory());
    }

    public function testEntityId(): void
    {
        $this->response = new GetResponse(['entityid' => 123]);

        $this->assertIsInt($this->response->entityId());
        $this->assertEquals(123, $this->response->entityId());
    }

    public function testEaqId(): void
    {
        $this->response = new GetResponse(['eaqid' => 0]);

        $this->assertIsInt($this->response->eaqId());
        $this->assertEquals(0, $this->response->eaqId());
    }

    public function testPaused(): void
    {
        $this->response = new GetResponse(['paused' => false]);

        $this->assertIsBool($this->response->paused());
        $this->assertFalse($this->response->paused());
    }

    public function testCustomerCost(): void
    {
        $this->response = new GetResponse(['customercost' => '0.0']);

        $this->assertIsFloat($this->response->customerCost());
        $this->assertEquals('0.00', $this->response->customerCost());
    }

    public function testOrderStatus(): void
    {
        $this->response = new GetResponse(['orderstatus' => []]);

        $this->assertIsArray($this->response->orderStatus());
    }

    public function testIsRecurring(): void
    {
        $this->response = new GetResponse(['recurring' => false]);

        $this->assertIsBool($this->response->isRecurring());
        $this->assertFalse($this->response->isRecurring());
    }

    public function testEntityTypeId(): void
    {
        $this->response = new GetResponse(['entitytypeid' => 283]);

        $this->assertIsInt($this->response->entityTypeId());
        $this->assertEquals(283, $this->response->entityTypeId());
    }

    public function testDeletionRequest(): void
    {
        $this->response = new GetResponse(['isDeletionRequest' => false]);

        $this->assertIsBool($this->response->deletionRequest());
        $this->assertFalse($this->response->deletionRequest());
    }

    public function testResellerCost(): void
    {
        $this->response = new GetResponse(['resellercost' => 0]);

        $this->assertIsFloat($this->response->resellerCost());
        $this->assertEquals('0.00', $this->response->resellerCost());
    }

    public function testJumpConditions(): void
    {
        $this->response = new GetResponse(['jumpConditions' => []]);

        $this->assertIsArray($this->response->jumpConditions());
    }

    public function testCurrentOrderPrice(): void
    {
        $this->response = new GetResponse(['currentOrderPrice' => '0.0']);

        $this->assertIsFloat($this->response->currentOrderPrice());
        $this->assertEquals('0.00', $this->response->currentOrderPrice());
    }

    public function testActionCompleted(): void
    {
        $this->response = new GetResponse(['actioncompleted' => '0']);

        $this->assertIsString($this->response->actionCompleted());
        $this->assertEquals('0', $this->response->actionCompleted());
    }

    public function testMoneyBackPeriod(): void
    {
        $this->response = new GetResponse(['moneybackperiod' => 30]);

        $this->assertIsInt($this->response->moneyBackPeriod());
        $this->assertEquals(30, $this->response->moneyBackPeriod());
    }
}
