<?php

namespace Tests\Unit\Orders\Domains\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\DomainOrderDetailType;
use ResellerClub\Orders\Domains\Requests\GetRequest;
use ResellerClub\Orders\Order;

class GetRequestTest extends TestCase
{
    /**
     * @var DomainOrderDetailType
     */
    private $domainOrderDetailType;

    /**
     * @var GetRequest
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();

        $this->domainOrderDetailType = DomainOrderDetailType::all();

        $this->request = new GetRequest(
            $order = new Order(123),
            $this->domainOrderDetailType
        );
    }

    public function testItCanGetOrderId(): void
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testItCanGetOrderDetailType(): void
    {
        $this->assertInstanceOf(DomainOrderDetailType::class, $this->request->orderDetailType());
        $this->assertEquals((string) $this->domainOrderDetailType, $this->request->orderDetailType());
    }
}
