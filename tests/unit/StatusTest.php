<?php

namespace Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;
use ResellerClub\Status;

class StatusTest extends TestCase
{
    public function testStatus()
    {
        $this->assertEquals('success', (string) new Status('Success'));
        $this->assertEquals('success', (string) new Status('SUCCESS'));
        $this->assertEquals('success', (string) new Status('success'));
    }
}
