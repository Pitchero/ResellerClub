<?php

namespace ResellerClub;

use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;

class ExceptionHandler
{
    /**
     * @var Exception
     */
    private $exception;

    /**
     * ExceptionHandler constructor.
     *
     * @param Exception $exception
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Render out a standardised exception.
     *
     * @return ApiClientException|ApiException|ConnectionException
     */
    public function render()
    {
        switch ($this->exception) {
            case $this->exception instanceof ClientException:
                return new ApiClientException($this->getMessage($this->exception), $this->exception->getCode());
            case $this->exception instanceof RequestException:
                return new ConnectionException($this->getMessage($this->exception), $this->exception->getCode());
            default:
                return new ApiException($this->getMessage($this->exception), $this->exception->getCode());
        }
    }

    /**
     * Gets the error message for the exception by checking the response first, else default to the exception message.
     *
     * @param Exception $exception
     *
     * @return string
     */
    private function getMessage(Exception $exception)
    {
        $response_contents = $this->responseContents($exception);

        return array_key_exists('message', $response_contents) ?
            $response_contents['message'] :
            $exception->getMessage();
    }

    /**
     * Gets the response contents, if it exists.
     *
     * @param Exception $exception
     *
     * @return array
     */
    private function responseContents(Exception $exception) :array
    {
        if (!method_exists($exception, 'getResponse')) {
            return [];
        }

        return json_decode($exception->getResponse()->getBody()->getContents(), true);
    }
}
