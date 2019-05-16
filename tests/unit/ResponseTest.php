<?php

namespace Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Dns\Cname\Responses\AddResponse;
use ResellerClub\Dns\Cname\Responses\UpdateResponse;
use ResellerClub\Message;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;
use ResellerClub\Status;

class ResponseTest extends TestCase
{
    public function testStatus()
    {
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['status' => 'Success'])
        );

        $this->assertInstanceOf(Status::class, BusinessEmailOrderResponse::fromApiResponse($response)->status());
        $this->assertEquals('success', BusinessEmailOrderResponse::fromApiResponse($response)->status());

        $this->assertInstanceOf(Status::class, CreateResponse::fromApiResponse($response)->status());
        $this->assertEquals('success', CreateResponse::fromApiResponse($response)->status());
    }

    public function testMessage()
    {
        $message = 'The request executed successfully';
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['msg' => $message])
        );

        $this->assertInstanceOf(Message::class, AddResponse::fromApiResponse($response)->message());
        $this->assertEquals($message, AddResponse::fromApiResponse($response)->message());

        $this->assertInstanceOf(Message::class, UpdateResponse::fromApiResponse($response)->message());
        $this->assertEquals($message, UpdateResponse::fromApiResponse($response)->message());
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
