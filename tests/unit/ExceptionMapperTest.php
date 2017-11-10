<?php

namespace ResellerClub\Tests;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\ExceptionMapper;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;

class ExceptionHandlerTest extends TestCase
{
    /**
     * @var Request
     */
    private $request;

    public function testApiClientException()
    {
        $expectedMessage = 'Authentication failure';
        $expectedCode = 400;

        $requestException = new ClientException(
            'Some other base message.',
            $this->request,
            $this->response($expectedCode, $expectedMessage)
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(ApiClientException::class, $exception);
        $this->assertEquals($expectedCode, $exception->getCode());
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testConnectionException()
    {
        $expectedMessage = 'Authentication failure';

        $requestException = new ConnectException(
            $expectedMessage,
            $this->request
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(ConnectionException::class, $exception);

        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testApiException()
    {
        $expectedMessage = 'Some base message.';
        $expectedCode = 500;

        $requestException = new RequestException(
            'Some other base message.',
            $this->request,
            $this->response($expectedCode, $expectedMessage)
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(ApiException::class, $exception);
        $this->assertEquals($expectedCode, $exception->getCode());
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->request = new Request('GET', 'https://test');
    }

    private function response($expectedCode, $expectedMessage)
    {
        return new Response($expectedCode, [], json_encode(['status' => 'Error', 'message' => $expectedMessage]));
    }
}
