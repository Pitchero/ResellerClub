<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use PHPUnit\Framework\TestCase;
use ResellerClub\Action;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;

class BusinessEmailOrderResponseTest extends TestCase
{
    /**
     * @var BusinessEmailOrderResponse
     */
    private $response;

    protected function setUp()
    {
        parent::setUp();

        $this->response = new BusinessEmailOrderResponse([
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
        $this->assertEquals('some-domain.co.in', $this->response->domain());
    }

    public function testItCanGetOrderId()
    {
        $this->assertEquals(1234, $this->response->orderId());
    }

    public function testItCanGetAction()
    {
        $this->assertInstanceOf(Action::class, $this->response->action());
    }
}
