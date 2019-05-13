<?php

namespace ResellerClub\Dns\Cname;

use ResellerClub\Api;
use ResellerClub\Dns\Cname\Requests\UpdateRequest;
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
     * Update an existing CNAME record.
     *
     * @see https://manage.resellerclub.com/kb/node/1101
     *
     * @param UpdateRequest $request
     *
     * @return mixed
     */
    public function update(UpdateRequest $request)
    {
        $response = $this->api->post(
            'dns/manage/update-cname-record.json',
            [
                'domain-name'       => (string) $request->domainName(),
                'host'              => (string) $request->host(),
                'current-value'     => (string) $request->currentValue(),
                'new-value'         => (string) $request->newValue(),
                'ttl'               => $request->ttl(),
            ]
        );

        return UpdateResponse::fromApiResponse($response);
    }
}
