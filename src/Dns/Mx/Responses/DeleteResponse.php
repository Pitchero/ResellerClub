<?php

namespace ResellerClub\Dns\Mx\Responses;

use ResellerClub\Exceptions\DoesNotExistResponseException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Response;

class DeleteResponse extends Response
{
    /**
     * @param array $attributes
     * @throws DoesNotExistResponseException
     * @throws ResponseException
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->throwExceptionIfWasNotSuccessful();
    }

    /**
     * Throws the appropriate exception if the response was not successful.
     *
     * @throws DoesNotExistResponseException
     * @throws ResponseException
     */
    private function throwExceptionIfWasNotSuccessful()
    {
        // Not all responses contain a status it would seem, for example get business email.
        if (!$this->wasSuccessful()) {
            throw new ResponseException($this->response['message']);
        }
    }
}