<?php

namespace Tests\Unit\Orders\EmailAccounts\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\Order;

class DeleteRequestTest extends TestCase
{
    /**
     * @var DeleteRequest
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();

        $order = new Order(123);

        $this->request = new DeleteRequest(
            $order,
            new EmailAddress($email = 'john.doe@my-domain.co.uk')
        );
    }

    public function testOrderId(): void
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testEmail(): void
    {
        $this->assertEquals('john.doe@my-domain.co.uk', $this->request->email());
    }
}
