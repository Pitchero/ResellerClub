<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\BusinessEmails\Responses\AddedEmailAccountResponseFactory;
use ResellerClub\Orders\InvoiceOption;

class AddedEmailAccountResponseFactoryTest extends TestCase
{
    public function testPayInvoiceResponse(): void
    {
        $responseBody = [
            'actionstatusdesc'        => 'Request will be processed in some time.',
            'status'                  => 'Success',
            'sellingamount'           => '-90.540',
            'eaqid'                   => '469770847',
            'description'             => 'test-domain-3.co.uk.onlyfordemo.com',
            'actionstatus'            => 'InvoicePaid',
            'actiontype'              => 'AddEmailAccount',
            'entityid'                => '80030154',
            'unutilisedsellingamount' => '-90.540',
            'invoiceid'               => '78877737',
            'sellingcurrencysymbol'   => 'GBP',
            'customerid'              => '17824872',
            'actiontypedesc'          => 'Addition of 1 email account for test-domain-3.co.uk.onlyfordemo.com',
        ];

        $response = AddedEmailAccountResponseFactory::response(
            InvoiceOption::payInvoice(),
            $this->guzzleResponse(['78877737' => $responseBody])
        );

        $this->assertInstanceOf(GuzzleResponse::class, $response);

        $decodedResponseBody = $this->decodeResponseBody($response);

        foreach ($responseBody as $key => $value) {
            $this->assertArrayHasKey($key, $decodedResponseBody);
            $this->assertEquals($value, $decodedResponseBody[$key]);
        }
    }

    public function testKeepInvoiceResponse(): void
    {
        $responseBody = [
            'actionstatusdesc'        => 'Request will be processed in some time.',
            'status'                  => 'Success',
            'sellingamount'           => '-90.540',
            'eaqid'                   => '469770847',
            'description'             => 'test-domain-3.co.uk.onlyfordemo.com',
            'actionstatus'            => 'InvoicePaid',
            'actiontype'              => 'AddEmailAccount',
            'entityid'                => '80030154',
            'unutilisedsellingamount' => '-90.540',
            'invoiceid'               => '78877737',
            'sellingcurrencysymbol'   => 'GBP',
            'customerid'              => '17824872',
            'actiontypedesc'          => 'Addition of 1 email account for test-domain-3.co.uk.onlyfordemo.com',
        ];

        $response = AddedEmailAccountResponseFactory::response(
            InvoiceOption::keepInvoice(),
            $this->guzzleResponse(['78877737' => $responseBody])
        );

        $this->assertInstanceOf(GuzzleResponse::class, $response);

        $decodedResponseBody = $this->decodeResponseBody($response);

        foreach ($responseBody as $key => $value) {
            $this->assertArrayHasKey($key, $decodedResponseBody);
            $this->assertEquals($value, $decodedResponseBody[$key]);
        }
    }

    public function testOnlyAddResponse(): void
    {
        $responseBody = [
            'customercost' => '90.54',
            'eaqid'        => '469769356',
            'customerid'   => '17824872',
            'invoiceid'    => '78877478',
        ];

        $response = AddedEmailAccountResponseFactory::response(
            InvoiceOption::onlyAdd(),
            $this->guzzleResponse($responseBody)
        );

        $this->assertInstanceOf(GuzzleResponse::class, $response);

        $decodedResponseBody = $this->decodeResponseBody($response);

        foreach ($responseBody as $key => $value) {
            $this->assertArrayHasKey($key, $decodedResponseBody);
            $this->assertEquals($value, $decodedResponseBody[$key]);
        }
    }

    public function testNoInvoiceResponse(): void
    {
        $responseBody = [
            'entityid'         => '80064711',
            'description'      => 'test-domain-3.co.uk.onlyfordemo.com',
            'actionstatus'     => 'InvoicePaid',
            'actionstatusdesc' => 'Request will be processed in some time.',
            'actiontypedesc'   => 'Addition of 1 email account for test-domain-3.co.uk.onlyfordemo.com',
            'status'           => 'Success',
            'eaqid'            => '470068363',
            'actiontype'       => 'AddEmailAccount',
        ];

        $response = AddedEmailAccountResponseFactory::response(
            InvoiceOption::noInvoice(),
            $this->guzzleResponse($responseBody)
        );

        $this->assertInstanceOf(GuzzleResponse::class, $response);

        $decodedResponseBody = $this->decodeResponseBody($response);

        foreach ($responseBody as $key => $value) {
            $this->assertArrayHasKey($key, $decodedResponseBody);
            $this->assertEquals($value, $decodedResponseBody[$key]);
        }
    }

    private function guzzleResponse(array $responseBody): GuzzleResponse
    {
        return new GuzzleResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($responseBody)
        );
    }

    private function decodeResponseBody(GuzzleResponse $response)
    {
        return json_decode($response->getBody(), true);
    }
}
