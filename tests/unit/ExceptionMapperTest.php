<?php

namespace Tests\Unit;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\ExceptionMapper;
use ResellerClub\Exceptions\ActionPendingException;
use ResellerClub\Exceptions\AlreadyRenewedException;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;
use ResellerClub\Exceptions\MinimumRequirementException;

class ExceptionMapperTest extends TestCase
{
    /**
     * @var Request
     */
    private $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = new Request('GET', 'https://test');
    }

    public function testApiClientException(): void
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

    public function testConnectionException(): void
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

    public function testApiException(): void
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

    public function testAlreadyRenewedException(): void
    {
        $expectedMessage = 'Domain already renewed.';
        $expectedCode = 500;

        $requestException = new ServerException(
            $expectedMessage,
            $this->request,
            $this->response($expectedCode, $expectedMessage)
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(AlreadyRenewedException::class, $exception);
        $this->assertEquals($expectedCode, $exception->getCode());
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testActionPendingException(): void
    {
        $expectedMessage = 'There is already an action pending on this Order.';
        $expectedCode = 500;

        $requestException = new ServerException(
            $expectedMessage,
            $this->request,
            $this->response($expectedCode, $expectedMessage)
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(ActionPendingException::class, $exception);
        $this->assertEquals($expectedCode, $exception->getCode());
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testMinimumRequirementException(): void
    {
        $expectedMessage = 'You must have atleast ONE email account.';
        $expectedCode = 500;

        $requestException = new ServerException(
            $expectedMessage,
            $this->request,
            $this->response($expectedCode, $expectedMessage)
        );

        $exception_handler = new ExceptionMapper();
        $exception = $exception_handler->map($requestException);

        $this->assertInstanceOf(MinimumRequirementException::class, $exception);
        $this->assertEquals($expectedCode, $exception->getCode());
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    private function response($expectedCode, $expectedMessage): Response
    {
        return new Response($expectedCode, [], json_encode(['status' => 'Error', 'message' => $expectedMessage]));
    }
}
