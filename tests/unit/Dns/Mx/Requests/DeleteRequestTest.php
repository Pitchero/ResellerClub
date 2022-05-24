<?php

namespace unit\Dns\Mx\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Mx\Responses\DeleteResponse;
use ResellerClub\Status;

class DeleteRequestTest extends TestCase
{
    public function testStatusSet()
    {
        $response = new DeleteResponse([
            'status' => 'SUCCESS'
        ]);

        $this->assertInstanceOf(Status::class, $response->status());
        $this->assertEquals('success', (string)$response->status());
    }
}