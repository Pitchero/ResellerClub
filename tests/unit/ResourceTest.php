<?php

namespace ResellerClub\Tests;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Resources\BusinessEmailOrderResource;
use ResellerClub\Orders\BusinessEmails\Resources\CreateResource;

class ResourceTest extends TestCase
{
    public function testStatus()
    {
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['status' => 'Success'])
        );

        $this->assertEquals('Success', BusinessEmailOrderResource::fromResponse($response)->status());
        $this->assertEquals('Success', CreateResource::fromResponse($response)->status());
    }
}
