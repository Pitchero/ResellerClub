<?php

namespace ResellerClub\Dns\Cname;

use ResellerClub\Api;
use ResellerClub\Dns\Cname\Requests\AddRequest;
use ResellerClub\Dns\Cname\Requests\UpdateRequest;
use ResellerClub\Dns\Cname\Responses\AddResponse;
use ResellerClub\Dns\Cname\Responses\UpdateResponse;

class CnameRecord
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
     * Add a new CNAME record.
     *
     * @see https://manage.resellerclub.com/kb/node/1092
     *
     * @param AddRequest $request
     *
     * @return AddResponse
     */
    public function add(AddRequest $request): AddResponse
    {
        $response = $this->api->post(
            'dns/manage/add-cname-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'value'             => (string) $request->value(),
                'ttl'               => $request->ttl(),
            ]
        );

        return AddResponse::fromApiResponse($response);
    }

    /**
     * Update an existing CNAME record.
     *
     * @see https://manage.resellerclub.com/kb/node/1101
     *
     * @param UpdateRequest $request
     *
     * @return UpdateResponse
     */
    public function update(UpdateRequest $request): UpdateResponse
    {
        $response = $this->api->post(
            'dns/manage/update-cname-record.json',
            [
                'domain-name'       => (string) $request->domain(),
                'host'              => (string) $request->record(),
                'current-value'     => (string) $request->currentValue(),
                'new-value'         => (string) $request->newValue(),
                'ttl'               => $request->ttl(),
            ]
        );

        return UpdateResponse::fromApiResponse($response);
    }
}
