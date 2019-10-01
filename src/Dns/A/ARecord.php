<?php

namespace ResellerClub\Dns\A;

use ResellerClub\Api;
use ResellerClub\Dns\A\Requests\AddRequest;
use ResellerClub\Dns\A\Requests\UpdateRequest;
use ResellerClub\Dns\A\Responses\AddResponse;
use ResellerClub\Dns\A\Responses\UpdateResponse;

class ARecord
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
     * Add a new A record.
     *
     * @see https://manage.resellerclub.com/kb/node/1093
     *
     * @param AddRequest $request
     *
     * @return AddResponse
     */
    public function add(AddRequest $request): AddResponse
    {
        $response = $this->api->post(
            'dns/manage/add-ipv4-record.json',
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
     * Update an existing A record.
     *
     * @see https://manage.resellerclub.com/kb/node/1098
     *
     * @param UpdateRequest $request
     *
     * @return UpdateResponse
     */
    public function update(UpdateRequest $request): UpdateResponse
    {
        $response = $this->api->post(
            'dns/manage/update-ipv4-record.json',
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
}
