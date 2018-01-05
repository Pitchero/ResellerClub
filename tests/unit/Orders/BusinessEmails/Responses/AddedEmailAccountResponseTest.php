<?php

namespace Tests\Unit\Orders\BusinessEmails\Responses;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ResellerClub\Action;
use ResellerClub\Orders\BusinessEmails\Responses\AddedEmailAccountResponse;
use ResellerClub\Status;

class AddedEmailAccountResponseTest extends TestCase
{
    /**
     * @var RenewalResponse
     */
    private $response;

    protected function setUp()
    {
        parent::setUp();

        $this->response = new AddedEmailAccountResponse([
            'eaqid'                   => '469754540',
            'actionstatus'            => 'InvoicePaid',
            'actionstatusdesc'        => 'Request will be processed in some time.',
            'actiontype'              => 'AddEmailAccount',
            'actiontypedesc'          => 'Addition of 1 email account for test-domain.co.uk.onlyfordemo.com',
            'entityid'                => '80030154',
            'description'             => 'test-domain.co.uk.onlyfordemo.com',
            'status'                  => 'Success',
            'invoiceid'               => '78877737',
            'customerid'              => '17824872',
            'sellingcurrencysymbol'   => 'GBP',
            'sellingamount'           => '-90.540',
            'unutilisedsellingamount' => '-90.540',
            'customercost'            => '90.54',
        ]);
    }

    public function testItCanGetAction()
    {
        $this->assertInstanceOf(Action::class, $this->response->action());
        $this->assertEquals(469754540, $this->response->action()->id());
        $this->assertEquals('AddEmailAccount', $this->response->action()->type());
        $this->assertEquals(
            'Addition of 1 email account for test-domain.co.uk.onlyfordemo.com',
            $this->response->action()->typeDescription()
        );
        $this->assertEquals('InvoicePaid', $this->response->action()->status());
        $this->assertEquals('Request will be processed in some time.', $this->response->action()->statusDescription());
    }

    public function testItCanGetEntityId()
    {
        $this->assertEquals(80030154, $this->response->entityId());
    }

    public function testItCanGetDomain()
    {
        $this->assertEquals('test-domain.co.uk.onlyfordemo.com', $this->response->domain());
    }

    public function testItCanGetStatus()
    {
        $this->assertInstanceOf(Status::class, $this->response->status());
        $this->assertEquals('success', (string) $this->response->status());
    }

    public function testItCanGetInvoiceId()
    {
        $this->assertEquals(78877737, $this->response->invoiceId());
    }

    public function testItCanGetCustomerId()
    {
        $this->assertEquals(17824872, $this->response->customerId());
    }

    public function testItCanGetSellingCurrencySymbol()
    {
        $this->assertEquals('GBP', $this->response->sellingCurrencySymbol());
    }

    public function testItCanGetSellingCurrency()
    {
        $this->assertInstanceOf(Currency::class, $this->response->sellingCurrency());
    }

    public function testItCanGetSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->sellingAmount());
        $this->assertEquals('-9054', $this->response->sellingAmount()->getAmount());
    }

    public function testItCanGetUnutilisedSellingAmount()
    {
        $this->assertInstanceOf(Money::class, $this->response->unutilisedSellingAmount());
        $this->assertEquals('-9054', $this->response->unutilisedSellingAmount()->getAmount());
    }

    public function testItCanGetCustomerCost()
    {
        $this->assertInstanceOf(Money::class, $this->response->customerCost());
        $this->assertEquals('9054', $this->response->customerCost()->getAmount());
    }










}
