<?php

namespace ResellerClub\Orders\BusinessEmails\Responses;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use ResellerClub\Orders\InvoiceOption;

class AddedEmailAccountResponseFactory
{
    /**
     * Format the response into a standardised way.
     *
     * @param InvoiceOption  $invoiceOption
     * @param GuzzleResponse $response
     *
     * @return GuzzleResponse
     */
    public static function response(InvoiceOption $invoiceOption, GuzzleResponse $response)
    {
        switch ($invoiceOption) {
            case InvoiceOption::payInvoice():
            case InvoiceOption::keepInvoice():
                return (new self())->flattenGuzzleResponse($response);
            default:
                return $response;
        }
    }

    /**
     * Flatten the response body and re-create as a Guzzle response.
     *
     * @param GuzzleResponse $response
     *
     * @return GuzzleResponse
     */
    private function flattenGuzzleResponse(GuzzleResponse $response): GuzzleResponse
    {
        $decodedResponse = $this->decodeResponseBody($response);

        return new GuzzleResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(reset($decodedResponse))
        );
    }

    /**
     * Decode the response body to an array.
     *
     * @param GuzzleResponse $response
     *
     * @return array
     */
    private function decodeResponseBody(GuzzleResponse $response): array
    {
        return json_decode($response->getBody(), true);
    }

    private function __construct()
    {
        // Prevent this class from being constructed in another way.
    }
}
