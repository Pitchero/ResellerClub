<?php

namespace ResellerClub\Dns\SearchRecords;

use ResellerClub\Api;
use ResellerClub\Dns\SearchRecords\Requests\GetRequest;
use ResellerClub\Dns\SearchRecords\Responses\GetResponse;

class SearchRecord
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
     * Search a domain for DNS records.
     *
     * @see https://manage.resellerclub.com/kb/answer/1106
     *
     * @param GetRequest $request
     *
     * @return GetResponse
     */
    public function get(GetRequest $request): GetResponse
    {
        $response = $this->api->get(
            'dns/manage/search-records.json',
            [
                'domain-name'       => (string) $request->domain(),
                'type'              => (string) $request->type(),
                'no-of-records'     => (int) $request->numberOfRecords(),
                'page-no'           => (int) $request->pageNumber(),
                'host'              => (string) $request->hostName(),
                'value'             => (string) $request->value()
            ]
        );

        return GetResponse::fromApiResponse($response);
    }
}