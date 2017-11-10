<?php

namespace ResellerClub\Tests;

use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\ExceptionHandler;
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
        $expected_message = 'Authentication failure';
        $expected_code = 400;

        $request_exception = new ClientException(
            'Some other base message.',
            $this->request,
            $this->response($expected_code, $expected_message)
        );

        $exception_handler = new ExceptionHandler($request_exception);
        $exception = $exception_handler->render();

        $this->assertInstanceOf(ApiClientException::class, $exception);
        $this->assertEquals($expected_code, $exception->getCode());
        $this->assertEquals($expected_message, $exception->getMessage());
    }

    public function testConnectionException()
    {
        $expected_message = 'Authentication failure';


        $request_exception = new ConnectException(
            $expected_message,
            $this->request
        );

        $exception_handler = new ExceptionHandler($request_exception);
        $exception = $exception_handler->render();

        $this->assertInstanceOf(ConnectionException::class, $exception);

        $this->assertEquals($expected_message, $exception->getMessage());
    }

    public function testApiException()
    {
        $expected_message = 'Some base message.';
        $expected_code = 500;

        $request_exception = new RequestException(
            'Some other base message.',
            $this->request,
            $this->response($expected_code, $expected_message)
        );

        $exception_handler = new ExceptionHandler($request_exception);
        $exception = $exception_handler->render();

        $this->assertInstanceOf(ApiException::class, $exception);
        $this->assertEquals($expected_code, $exception->getCode());
        $this->assertEquals($expected_message, $exception->getMessage());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->request = new Request('GET', 'https://test');
    }

    private function response($expected_code, $expected_message)
    {
        return new Response($expected_code, [], json_encode(['status' => 'Error', 'message' => $expected_message]));
    }
}
