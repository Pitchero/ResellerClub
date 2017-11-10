<?php

namespace ResellerClub;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;

class ExceptionMapper
{
    /**
     * @var Exception
     */
    private $exception;

    /**
     * ExceptionHandler constructor.
     *
     * @param RequestException $exception
     */
    public function __construct(RequestException $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Render out a standardised exception.
     *
     * @return ApiException
     */
    public function map(): ApiException
    {
        $code = $this->exception->getCode();
        $message = $this->getMessage($this->exception);

        switch (get_class($this->exception)) {
            case ClientException::class:
                return new ApiClientException($message, $code);
            case ConnectException::class:
                return new ConnectionException($message, $code);
            default:
                return new ApiException($message, $code);
        }
    }

    /**
     * Gets the error message for the exception by checking the response first, else default to the exception message.
     *
     * @param RequestException $exception
     *
     * @return string
     */
    private function getMessage(RequestException $exception): string
    {
        $response_contents = $this->responseContents($exception);

        return array_key_exists('message', $response_contents) ?
            $response_contents['message'] :
            $exception->getMessage();
    }

    /**
     * Gets the response contents, if it exists.
     *
     * @param RequestException $exception
     *
     * @return array
     */
    private function responseContents(RequestException $exception) :array
    {
        if (!$exception->hasResponse()) {
            return [];
        }

        $contents = json_decode($exception->getResponse()->getBody()->getContents(), true);

        return is_array($contents) ? $contents : [];
    }
}
