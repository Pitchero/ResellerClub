<?php

namespace Tests\Unit\Orders\BusinessEmails;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\Orders\Domains\DomainOrder;
use ResellerClub\Orders\Domains\DomainOrderDetailType;
use ResellerClub\Orders\Domains\Requests\GetByDomainRequest;
use ResellerClub\Orders\Domains\Requests\GetRequest;
use ResellerClub\Orders\Domains\Requests\RenewRequest;
use ResellerClub\Orders\Domains\Responses\GetResponse;
use ResellerClub\Orders\Domains\Responses\RenewalResponse;
use ResellerClub\Orders\InvoiceOption;
use ResellerClub\Orders\Order;

class DomainOrderTest extends TestCase
{
    public function testResponseFromDomainOrderGet()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode($this->getDomainResponse())
            ),
        ]);

        $domainOrder = new DomainOrder($this->api($mock));

        $this->assertInstanceOf(
            GetResponse::class,
            $domainOrder->get(
                new GetRequest(
                    new Order(123),
                    DomainOrderDetailType::all()
                )
            )
        );
    }

    public function testResponseFromDomainOrderGetByDomain()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode($this->getDomainResponse())
            ),
        ]);

        $domainOrder = new DomainOrder($this->api($mock));

        $this->assertInstanceOf(
            GetResponse::class,
            $domainOrder->getByDomain(
                new GetByDomainRequest(
                    $domain = 'some-domain.co.uk',
                    DomainOrderDetailType::all()
                )
            )
        );
    }

    public function testResponseFromDomainOrderRenew()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'actiontypedesc'          => 'Renewal of yesterday.co.in for 1 year',
                    'unutilisedsellingamount' => '-7.910',
                    'sellingamount'           => '-7.910',
                    'entityid'                => '85547813',
                    'actionstatus'            => 'Success',
                    'privacydetails'          => [
                        'entityid' => '85547813',
                        'status'   => 'error',
                        'error'    => 'Privacy Protection Service not available.',
                    ],
                    'status'                  => 'Success',
                    'eaqid'                   => '524620696',
                    'customerid'              => '17824872',
                    'description'             => 'yesterday.co.in',
                    'actiontype'              => 'RenewDomain',
                    'invoiceid'               => '88713188',
                    'sellingcurrencysymbol'   => 'GBP',
                    'actionstatusdesc'        => 'Domain renewed successfully',
                ])
            ),
        ]);

        $domainOrder = new DomainOrder($this->api($mock));

        $this->assertInstanceOf(
            RenewalResponse::class,
            $domainOrder->renew(
                new RenewRequest(
                    new Order(85547813),
                    Carbon::createFromTimestamp('1610973790'),
                    InvoiceOption::noInvoice(),
                    $years = 1,
                    $purchasePrivacyProtection = false,
                    $autoRenew = false
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

    private function getDomainResponse(): array
    {
        return [
            'entityid'     => '85535806',
            'recurring'    => 'false',
            'description'  => 'example-testing-domain.info',
            'domainstatus' => [
                'sixtydaylock',
            ],
            'registrantcontact' => [],
            'admincontact'      => [
                'company'       => 'Pitchero',
                'parentkey'     => '999999999_999999998_715226',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'r.rosebury@pitchero.com',
                'address3'      => 'Capitol Park East',
                'address2'      => 'Sterling House',
                'contactstatus' => 'Active',
                'address1'      => 'Pitchero',
                'contactid'     => '72860792',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'WF3 1DR',
                'customerid'    => '17824872',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Development',
                'telno' => '1132926070',
            ],
            'productkey'              => 'dominfo',
            'ns2'                     => 'dns4.parkpage.foundationapi.com',
            'productcategory'         => 'domorder',
            'admincontactid'          => '72860792',
            'ns1'                     => 'dns3.parkpage.foundationapi.com',
            'currentstatus'           => 'Active',
            'customercost'            => '0.0',
            'cns'                     => [],
            'moneybackperiod'         => '0',
            'classkey'                => 'dominfo',
            'privacyprotectedallowed' => 'true',
            'raaVerificationStatus'   => 'Pending',
            'resellercost'            => '0',
            'gdpr'                    => [
                'enabled'  => 'true',
                'eligible' => 'true',
            ],
            'customerid'          => '17824872',
            'isImmediateReseller' => 'true',
            'actioncompleted'     => '0',
            'parentkey'           => '999999999_999999998_715226',
            'eaqid'               => '0',
            'isprivacyprotected'  => 'false',
            'domainname'          => 'example-testing-domain.info',
            'paused'              => 'false',
            'noOfNameServers'     => '2',
            'creationtime'        => '1547726228',
            'techcontact'         => [
                'company'       => 'Pitchero',
                'parentkey'     => '999999999_999999998_715226',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'r.rosebury@pitchero.com',
                'address3'      => 'Capitol Park East',
                'address2'      => 'Sterling House',
                'contactstatus' => 'Active',
                'address1'      => 'Pitchero',
                'contactid'     => '72860792',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'WF3 1DR',
                'customerid'    => '17824872',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Development',
                'telno' => '1132926070',
            ],
            'techcontactid'              => '72860792',
            'isOrderSuspendedUponExpiry' => 'false',
            'autoRenewAttemptDuration'   => '30',
            'billingcontactid'           => '72860792',
            'entitytypeid'               => '2',
            'allowdeletion'              => 'true',
            'addons'                     => [],
            'domsecret'                  => 'mRAokDRN7S',
            'registrantcontactid'        => '72860792',
            'orderSuspendedByParent'     => 'false',
            'orderid'                    => '85535806',
            'endtime'                    => '1579262228',
            'dnssec'                     => [],
            'jumpConditions'             => [],
            'billingcontact'             => [],
            'autoRenewTermType'          => 'LONG_TERM',
            'classname'                  => 'com.logicboxes.foundation.sfnb.order.domorder.DomInfo',
            'raaVerificationStartTime'   => '1547726229',
            'orderstatus'                => [
                'transferlock',
            ],
        ];
    }
}
