<?php

namespace Tests\Unit\Orders\EmailForwarders\Responses;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailForwarders\Responses\AddedResponse;
use ResellerClub\Status;

class AddedResponseTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->response = new AddedResponse([
            'response' => [
                'status' => 'SUCCESS',
            ],
        ]);
    }

    public function testItCanGetStatus()
    {
        $this->assertInstanceOf(Status::class, $this->response->status());
        $this->assertEquals('success', (string) $this->response->status());
    }

    public function testItIsSuccessfulIfStatusIsSuccess()
    {
        $this->assertTrue($this->response->wasSuccessful());
    }
}
