<?php

namespace ResellerClub\Dns\Txt;

use ResellerClub\Api;
use ResellerClub\Dns\Txt\Requests\AddRequest;
use ResellerClub\Dns\Txt\Requests\DeleteRequest;
use ResellerClub\Dns\Txt\Requests\UpdateRequest;
use ResellerClub\Dns\Txt\Responses\AddResponse;
use ResellerClub\Dns\Txt\Responses\DeleteResponse;
use ResellerClub\Dns\Txt\Responses\UpdateResponse;

class TxtRecord
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Add a new TXT record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1097
     *
     * @param AddRequest $request
     *
     * @return AddResponse
     */
    public function add(AddRequest $request): AddResponse
    {
        $response = $this->api->post(
            'dns/manage/add-txt-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'value'             => (string) $request->value(),
                'ttl'               => (int) $request->ttl()->integer(),
            ]
        );

        return AddResponse::fromApiResponse($response);
    }

    /**
     * Update an existing TXT record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1104
     *
     * @param UpdateRequest $request
     *
     * @return UpdateResponse
     */
    public function update(UpdateRequest $request): UpdateResponse
    {
        $response = $this->api->post(
            'dns/manage/update-txt-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'current-value'     => (string) $request->currentValue(),
                'new-value'         => (string) $request->newValue(),
                'ttl'               => (int) $request->ttl()->integer(),
            ]
        );

        return UpdateResponse::fromApiResponse($response);
    }

    /**
     * Delete an existing Txt record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1179
     *
     * @param DeleteRequest $request
     *
     * @return DeleteResponse
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        $response = $this->api->post(
            'dns/manage/delete-txt-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'value'             => (string) $request->value(),
            ]
        );

        return DeleteResponse::fromApiResponse($response);
    }
}