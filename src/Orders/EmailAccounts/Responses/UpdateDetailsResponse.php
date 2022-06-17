<?php

namespace ResellerClub\Orders\EmailAccounts\Responses;

use ResellerClub\Exceptions\DoesNotExistResponseException;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Response;
use ResellerClub\Status;

class UpdateDetailsResponse extends Response
{
    /**
     * The updated email account.
     *
     * @param array $attributes
     *
     * @throws MissingAttributeException
     * @throws DoesNotExistResponseException
     * @throws ResponseException
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->throwExceptionIfWasNotSuccessful();
    }

    /**
     * Get the response status.
     *
     * @return Status
     */
    public function status(): Status
    {
        if (!array_key_exists('status', $this->response)) {
            throw new MissingAttributeException('status');
        }

        return new Status($this->response['status']);
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