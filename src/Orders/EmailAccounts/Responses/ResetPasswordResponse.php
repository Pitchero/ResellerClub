<?php

namespace ResellerClub\Orders\EmailAccounts\Responses;

use ResellerClub\Exceptions\DoesNotExistResponseException;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Response;
use ResellerClub\Status;

class ResetPasswordResponse extends Response
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

        $this->throwExceptionIfNotSuccessful();
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
     * ResellerClub will provide a password for you to use, this is output in a string
     *
     * @return string
     */
    public function getPassword(): string
    {
        if (!array_key_exists('data', $this->response)) {
            throw new MissingAttributeException('data');
        }

        return $this->response['data'];
    }

    /**
     * Throws the appropriate exception if the response was not successful.
     *
     * @throws DoesNotExistResponseException
     * @throws ResponseException
     */
    private function throwExceptionIfNotSuccessful()
    {
        // Not all responses contain a status it would seem, for example get business email.
        if (!$this->wasSuccessful()) {
            throw new ResponseException($this->response['message']);
        }
    }
}