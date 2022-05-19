<?php

namespace unit\Dns\Txt\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Txt\Responses\DeleteResponse;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Status;

class DeleteRequestTest extends TestCase
{
    public function testMissingAttributeExceptionThrownWhenStatusNotSetInResponse()
    {
        try {
            new DeleteResponse(['response' => []]);
        } catch (MissingAttributeException $e) {
            $this->assertEquals('Expected attribute [status] was not in response.', $e->getMessage());

            return;
        }

        $this->fail('The missing attribute exception has not been thrown.');
    }

    public function testStatusSet()
    {
        $response = new DeleteResponse([
            'response' => ['status' => 'SUCCESS'],
        ]);

        $this->assertInstanceOf(Status::class, $response->status());
        $this->assertEquals('success', (string) $response->status());
    }
}