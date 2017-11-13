<?php

namespace Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;

class ResponseTest extends TestCase
{
    public function testStatus()
    {
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['status' => 'Success'])
        );

        $this->assertEquals('Success', BusinessEmailOrderResponse::fromApiResponse($response)->status());
        $this->assertEquals('Success', CreateResponse::fromApiResponse($response)->status());
    }

    public function wasSuccessful()
    {
        $successfulResponse = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['status' => 'Success'])
        );

        $failureResponse = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['status' => 'Failure'])
        );

        $this->assertTrue(CreateResponse::fromApiResponse($successfulResponse)->wasSuccessful());
        $this->assertFalse(CreateResponse::fromApiResponse($failureResponse)->wasSuccessful());
    }
}
