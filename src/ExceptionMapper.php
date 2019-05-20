<?php

namespace ResellerClub;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use ResellerClub\Exceptions\ActionPendingException;
use ResellerClub\Exceptions\AlreadyRenewedException;
use ResellerClub\Exceptions\ApiClientException;
use ResellerClub\Exceptions\ApiException;
use ResellerClub\Exceptions\ConnectionException;

class ExceptionMapper
{
    /**
     * Maps exceptions out a standardised exception.
     *
     * @param RequestException $exception
     *
     * @return ApiException
     */
    public function map(RequestException $exception): ApiException
    {
        $code = $exception->getCode();
        $message = $this->getMessage($exception);

        switch (get_class($exception)) {
            case ClientException::class:
                return new ApiClientException($message, $code);
            case ConnectException::class:
                return new ConnectionException($message, $code);
            case ServerException::class:
                return $this->mapApiSpecificErrors($message, $code);
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

    /**
     * Map any API specific messages to a new exception message.
     *
     * @param string $message
     * @param string $code
     *
     * @return ApiException
     */
    private function mapApiSpecificErrors(string $message, string $code): ApiException
    {
        switch ($message) {
            case 'Domain already renewed.':
                return new AlreadyRenewedException($message, $code);
            case 'There is already an action pending on this Order.':
                return new ActionPendingException($message, $code);
            default:
                return new ApiException($message, $code);
        }
    }
}
