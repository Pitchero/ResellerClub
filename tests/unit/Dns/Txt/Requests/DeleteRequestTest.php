<?php

namespace unit\Dns\Txt\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Txt\Responses\DeleteResponse;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Status;

class DeleteRequestTest extends TestCase
{
        public function testStatusSet()
    {
        $response = new DeleteResponse([
            'status' => 'SUCCESS'
        ]);

        $this->assertInstanceOf(Status::class, $response->status());
        $this->assertEquals('success', (string) $response->status());
    }
}