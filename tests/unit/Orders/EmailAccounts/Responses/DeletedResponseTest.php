<?php

namespace Tests\Unit\Orders\EmailAccounts\Responses;

use PHPUnit\Framework\TestCase;
use ResellerClub\Exceptions\DoesNotExistResponseException;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;
use ResellerClub\Status;

class DeletedResponseTest extends TestCase
{
    public function testMissingAttributeExceptionThrownWhenStatusNotSetInResponse()
    {
        try {
            new DeletedResponse(['response' => []]);
        } catch (MissingAttributeException $e) {
            $this->assertEquals('Expected attribute [status] was not in response.', $e->getMessage());

            return;
        }

        $this->fail('The missing attribute exception has not been thrown.');
    }

    public function testStatusSet()
    {
        $response = new DeletedResponse([
            'response' => ['status' => 'SUCCESS']
        ]);

        $this->assertInstanceOf(Status::class, $response->status());
        $this->assertEquals('success', (string) $response->status());
    }

    public function testDoesNotExistResponseThrownWhenEmailAddressErrorCodeFound()
    {
        $this->expectException(DoesNotExistResponseException::class);
        new DeletedResponse([
            'response' => [
                'status' => 'FAILURE',
                'message' => 'Email address test1@some-domain.co.uk does not exist',
                'errorCode' => 'emailaddress_does_not_exist',
            ]
        ]);
    }

    public function testResponseExceptionThrownWhenNotSuccessful()
    {
        try {
            new DeletedResponse([
                'response' => [
                    'status' => 'FAILURE',
                    'message' => 'A failure has occurred.',
                ]
            ]);
        } catch (ResponseException $e) {
            $this->assertEquals('A failure has occurred.', $e->getMessage());

            return;
        }

        $this->fail('The does not exist response exception was not thrown for the failure.');
    }
}
