<?php

namespace Tests\Unit\Orders\EmailForwarders\Responses;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailForwarders\Responses\CreateResponse;
use ResellerClub\Status;

class CreateResponseTest extends TestCase
{
    /**
     * @var CreateResponse
     */
    private $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
            ],
        ]);
    }

    public function testItCanGetStatus(): void
    {
        $this->assertInstanceOf(Status::class, $this->response->status());
        $this->assertEquals('success', (string) $this->response->status());
    }

    public function testItIsSuccessfulIfStatusIsSuccess()
    {
        $this->assertTrue($this->response->wasSuccessful());
    }
}
