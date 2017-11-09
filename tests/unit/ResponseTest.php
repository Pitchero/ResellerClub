<?php

namespace ResellerClub\Tests;

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
}
