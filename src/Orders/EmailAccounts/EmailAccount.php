<?php

namespace ResellerClub\Orders\EmailAccounts;

use ResellerClub\Api;
use ResellerClub\Orders\EmailAccounts\Requests\CreateRequest;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Requests\ResetPasswordRequest;
use ResellerClub\Orders\EmailAccounts\Requests\UpdateDetailsRequest;
use ResellerClub\Orders\EmailAccounts\Responses\CreateResponse;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;
use ResellerClub\Orders\EmailAccounts\Responses\ResetPasswordResponse;
use ResellerClub\Orders\EmailAccounts\Responses\UpdateDetailsResponse;

class EmailAccount
{
    /**
     * @var Api
     */
    private $api;

    /**
     * The API calls to the email account management of ResellerClub.
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Makes a POST request to ResellerClub's 'add' email accounts.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @param CreateRequest $request
     *
     * @return CreateResponse
     */
    public function create(CreateRequest $request): CreateResponse
    {
        $response = $this->api->post(
            'mail/user/add.json',
            [
                'order-id'           => $request->orderId(),
                'email'              => (string) $request->email(),
                'passwd'             => $request->password(),
                'notification-email' => (string) $request->notificationEmail(),
                'first-name'         => $request->firstName(),
                'last-name'          => $request->lastName(),
                'country-code'       => $request->countryCode(),
                'language-code'      => $request->languageCode(),
            ]
        );

        return CreateResponse::fromApiResponse($response);
    }

    /**
     * Makes a POST request to ResellerClub's 'delete' email accounts.
     *
     * @see https://manage.resellerclub.com/kb/answer/1049
     *
     * @param DeleteRequest $request
     *
     * @return DeletedResponse
     */
    public function delete(DeleteRequest $request): DeletedResponse
    {
        $response = $this->api->post(
            'mail/user/delete.json',
            [
                'order-id' => $request->orderId(),
                'email'    => (string) $request->email(),
            ]
        );

        return DeletedResponse::fromApiResponse($response);
    }

    /**
     * Makes a POST request to ResellerClub's 'update' email accounts.
     *
     * @see https://manage.resellerclub.com/kb/answer/1040
     *
     * @param UpdateDetailsRequest $request
     * @return UpdateDetailsResponse
     */
    public function updateDetails(UpdateDetailsRequest $request): UpdateDetailsResponse
    {
        $response = $this->api->post(
            'mail/user/modify.json',
            [
                'order-id' => $request->orderId(),
                'email' => $request->emailAddress(),
                'notification-email' => $request->notificationEmailAddress(),
                'first-name' => $request->firstName(),
                'last-name' => $request->lastName(),
            ]
        );

        return UpdateDetailsResponse::fromApiResponse($response);
    }

    /**
     * Makes a POST request to ResellerClub's 'reset-password' email account.
     *
     * @see https://manage.resellerclub.com/kb/answer/1118
     *
     * @param ResetPasswordRequest $request
     * @return ResetPasswordResponse
     */
    public function resetPassword(ResetPasswordRequest $request): ResetPasswordResponse
    {
        $response = $this->api->post(
            'mail/user/reset-password.json',
            [
                'order-id' => $request->orderId(),
                'email' => $request->emailAddress(),
            ]
        );

        return ResetPasswordResponse::fromApiResponse($response);
    }
}
