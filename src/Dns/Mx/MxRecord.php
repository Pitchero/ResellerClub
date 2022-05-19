<?php

namespace ResellerClub\Dns\Mx;

use ResellerClub\Api;
use ResellerClub\Dns\Mx\Requests\AddRequest;
use ResellerClub\Dns\Mx\Requests\DeleteRequest;
use ResellerClub\Dns\Mx\Requests\UpdateRequest;
use ResellerClub\Dns\Mx\Responses\AddResponse;
use ResellerClub\Dns\Mx\Responses\DeleteResponse;
use ResellerClub\Dns\Mx\Responses\UpdateResponse;

class MxRecord
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
     * Add a new MX record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1095
     *
     * @param AddRequest $request
     *
     * @return AddResponse
     */
    public function add(AddRequest $request): AddResponse
    {
        $response = $this->api->post(
            'dns/manage/add-mx-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'value'             => (string) $request->value(),
                'priority'          => (int) $request->priority(),
                'ttl'               => (int) $request->ttl()->integer(),
            ]
        );

        return AddResponse::fromApiResponse($response);
    }

    /**
     * Update an existing MX record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1102
     *
     * @param UpdateRequest $request
     *
     * @return UpdateResponse
     */
    public function update(UpdateRequest $request): UpdateResponse
    {
        $response = $this->api->post(
            'dns/manage/update-mx-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'current-value'     => (string) $request->currentValue(),
                'new-value'         => (string) $request->newValue(),
                'priority'          => (int) $request->priority(),
                'ttl'               => (int) $request->ttl()->integer(),
            ]
        );

        return UpdateResponse::fromApiResponse($response);
    }

    /**
     * Delete an existing MX record.
     *
     * @see https://manage.resellerclub.com/kb/answer/1177
     *
     * @param DeleteRequest $request
     *
     * @return DeleteResponse
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        $response = $this->api->post(
            'dns/manage/delete-mx-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'value'             => (string) $request->value(),
            ]
        );

        return DeleteResponse::fromApiResponse($response);
    }
}