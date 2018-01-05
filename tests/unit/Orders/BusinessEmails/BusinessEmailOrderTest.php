<?php

namespace Tests\Unit\Orders\BusinessEmails;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\BusinessEmails\BusinessEmailOrder;
use ResellerClub\Orders\BusinessEmails\Requests\AddEmailAccountRequest;
use ResellerClub\Orders\BusinessEmails\Requests\BusinessEmailOrderRequest;
use ResellerClub\Orders\BusinessEmails\Responses\AddedEmailAccountResponse;
use ResellerClub\Orders\BusinessEmails\Responses\BusinessEmailOrderResponse;
use ResellerClub\Orders\BusinessEmails\Responses\CreateResponse;
use ResellerClub\Orders\BusinessEmails\Responses\GetResponse;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class BusinessEmailOrderTest extends TestCase
{
    public function testResponseFromBusinessEmailOrderCreate()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'description'             => 'some-domain.co.in',
                    'entityid'                => 123,
                    'actiontype'              => 'Add',
                    'actiontypedesc'          => 'Addition of Business Email 1 for testdomainmail.com for 1 month',
                    'eaqid'                   => '461331388',
                    'actionstatus'            => 'PendingExecution',
                    'actionstatusdesc'        => '',
                    'invoiceid'               => '77433277',
                    'sellingcurrencysymbol'   => '£',
                    'sellingamount'           => '1.25',
                    'unutilisedsellingamount' => '1.00',
                    'customerid'              => 17824872,
                    'status'                  => 'Success',
                ])),
        ]);

        $businessEmailOrder = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
            CreateResponse::class,
            $businessEmailOrder->create(
                new BusinessEmailOrderRequest(
                    17824872,
                    'some-domain.co.in',
                    5,
                    1,
                    InvoiceOption::noInvoice()
                )
            )
        );
    }

    public function testResponseFromBusinessEmailOrderDelete()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'description'      => 'some-domain.co.in',
                    'entityid'         => 123,
                    'actiontype'       => 'Add',
                    'actiontypedesc'   => 'Addition of Business Email 1 for testdomainmail.com for 1 month',
                    'eaqid'            => '461331388',
                    'actionstatus'     => 'PendingExecution',
                    'actionstatusdesc' => '',
                    'status'           => 'Success',
                ])),
        ]);

        $businessEmailOrder = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
            BusinessEmailOrderResponse::class,
            $businessEmailOrder->delete(
                new Order(123)
            )
        );
    }

    public function testResponseFromBusinessEmailOrderGet()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'orderid'                   => '79244641',
                    'eaqid'                     => '0',
                    'description'               => 'name.onlyfordemo.com',
                    'currentstatus'             => 'Active',
                    'paused'                    => 'false',
                    'emailaccounts'             => 1,
                    'customercost'              => '0.0',
                    'parentkey'                 => '999999999_999999998_715226',
                    'orderstatus'               => [],
                    'creationtime'              => '1510142454',
                    'recurring'                 => 'false',
                    'entitytypeid'              => '283',
                    'isDeletionRequest'         => 'false',
                    'isImmediateReseller'       => 'true',
                    'productkey'                => 'eeliteus',
                    'customerid'                => '17824872',
                    'resellercost'              => '0',
                    'orderSuspendedByParent'    => 'false',
                    'endtime'                   => '1512734454',
                    'entityid'                  => '79244641',
                    'jumpConditions'            => [],
                    'currentOrderPrice'         => 0.0,
                    'isOrderSuspendedUponExpiry'=> 'false',
                    'actioncompleted'           => '0',
                    'domainname'                => 'name.onlyfordemo.com',
                    'productcategory'           => 'hosting',
                    'allowdeletion'             => 'true',
                    'moneybackperiod'           => '30',
                ])),
        ]);

        $businessEmailOrder = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
            GetResponse::class,
            $businessEmailOrder->get(
                new Order(123)
            )
        );
    }

    public function testResponseFromBusinessEmailOrderAddEmailAccount()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    '78877737' => [
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
                        'actiontypedesc'          => 'Addition of 1 email account for test-domain-3.co.uk.onlyfordemo.com'
                    ]
                ])
            ),
        ]);

        $businessEmailOrder = new BusinessEmailOrder($this->api($mock));

        $this->assertInstanceOf(
            AddedEmailAccountResponse::class,
            $businessEmailOrder->addEmailAccounts(
                new AddEmailAccountRequest(
                    new Order(123),
                    $numberOfAccounts = 1,
                    InvoiceOption::noInvoice()
                )
            )
        );
    }

    private function api(MockHandler $mock): Api
    {
        $handler = HandlerStack::create($mock);

        return new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => $handler])
        );
    }
}
