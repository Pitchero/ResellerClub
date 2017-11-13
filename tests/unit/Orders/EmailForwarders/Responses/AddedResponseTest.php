<?php

namespace Tests\Unit\Orders\EmailForwarders\Responses;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailForwarders\Responses\AddedResponse;

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
        $this->assertEquals('SUCCESS', $this->response->status());
    }

    public function testItIsSuccessfulIfStatusIsSuccess()
    {
        $this->assertTrue($this->response->wasSuccessful());
    }
}
