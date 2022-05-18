<?php

namespace Tests\Unit\Orders\Domains\Responses;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Contact;
use ResellerClub\Orders\Domains\DelegationSigner;
use ResellerClub\Orders\Domains\NamedServers;
use ResellerClub\Orders\Domains\PrivacyProtection;
use ResellerClub\Orders\Domains\RegistrantContactVerification;
use ResellerClub\Orders\Domains\RegistryStatus;
use ResellerClub\Orders\Domains\Responses\GetResponse;
use ResellerClub\Orders\GdprProtection;
use ResellerClub\Orders\LockedOrHoldStatus;
use ResellerClub\Orders\OrderStatus;

class GetResponseTest extends TestCase
{
    public function testEntityId(): void
    {
        $response = new GetResponse(['entityid' => 123]);

        $this->assertIsInt($response->entityId());
        $this->assertEquals(123, $response->entityId());
    }

    public function testOrderId()
    {
        $response = new GetResponse(['orderid' => 123]);

        $this->assertIsInt($response->orderId());
        $this->assertEquals(123, $response->orderId());

        $response = new GetResponse(['orderid' => null]);

        $this->assertIsInt($response->orderId());
        $this->assertEquals(0, $response->orderId());

        $response = new GetResponse([]);

        $this->assertIsInt($response->orderId());
        $this->assertEquals(0, $response->orderId());
    }

    public function testDescription(): void
    {
        $response = new GetResponse(['description' => 'domain description']);

        $this->assertIsString($response->description());
        $this->assertEquals('domain description', $response->description());

        $response = new GetResponse(['description' => null]);

        $this->assertIsString($response->description());
        $this->assertEquals('', $response->description());

        $response = new GetResponse([]);

        $this->assertIsString($response->description());
        $this->assertEquals('', $response->description());
    }

    public function testDomain(): void
    {
        $response = new GetResponse(['domainname' => 'some-domain.co.uk']);

        $this->assertIsString($response->domain());
        $this->assertEquals('some-domain.co.uk', $response->domain());

        $response = new GetResponse(['domainname' => null]);

        $this->assertIsString($response->domain());
        $this->assertEquals('', $response->domain());

        $response = new GetResponse([]);

        $this->assertIsString($response->domain());
        $this->assertEquals('', $response->domain());
    }

    public function testCurrentOrderStatus(): void
    {
        $response = new GetResponse(['currentstatus' => 'Active']);
        $this->assertInstanceOf(OrderStatus::class, $response->currentOrderStatus());

        $response = new GetResponse(['currentstatus' => null]);
        $this->assertInstanceOf(OrderStatus::class, $response->currentOrderStatus());

        $response = new GetResponse([]);
        $this->assertInstanceOf(OrderStatus::class, $response->currentOrderStatus());
    }

    public function testRegistryStatus(): void
    {
        $response = new GetResponse(['orderstatus' => 'resellerlock']);
        $this->assertInstanceOf(RegistryStatus::class, $response->registryStatus());
    }

    public function testLockedOrHoldStatus(): void
    {
        $response = new GetResponse(['domainstatus' => ['sixtydaylock']]);
        $this->assertInstanceOf(LockedOrHoldStatus::class, $response->lockedOrHoldStatus());

        $response = new GetResponse(['domainstatus' => 'sixtydaylock']);
        $this->assertInstanceOf(LockedOrHoldStatus::class, $response->lockedOrHoldStatus());
    }

    public function testProductCategory(): void
    {
        $response = new GetResponse(['productcategory' => 'domorder']);
        $this->assertIsString($response->productCategory());
        $this->assertEquals('domorder', $response->productCategory());

        $response = new GetResponse(['productcategory' => null]);
        $this->assertIsString($response->productCategory());
        $this->assertEquals('', $response->productCategory());

        $response = new GetResponse([]);
        $this->assertIsString($response->productCategory());
        $this->assertEquals('', $response->productCategory());
    }

    public function testProductId(): void
    {
        $response = new GetResponse(['productkey' => 'dominfo']);
        $this->assertIsString($response->productId());
        $this->assertEquals('dominfo', $response->productId());

        $response = new GetResponse(['productcategory' => null]);
        $this->assertIsString($response->productId());
        $this->assertEquals('', $response->productId());

        $response = new GetResponse([]);
        $this->assertIsString($response->productId());
        $this->assertEquals('', $response->productId());
    }

    public function testRegistryDate(): void
    {
        $response = new GetResponse(['creationtime' => '1547570574']);
        $this->assertInstanceOf(Carbon::class, $response->registryDate());
        $this->assertEquals(Carbon::createFromTimestamp(1547570574), $response->registryDate());
    }

    public function testRegistryExpiryDate(): void
    {
        $response = new GetResponse(['endtime' => '1547570898']);
        $this->assertInstanceOf(Carbon::class, $response->registryExpiryDate());
        $this->assertEquals(Carbon::createFromTimestamp(1547570898), $response->registryExpiryDate());
    }

    public function testCustomerId(): void
    {
        $response = new GetResponse(['customerid' => '17824872']);

        $this->assertIsInt($response->customerId());
        $this->assertEquals(17824872, $response->customerId());

        $response = new GetResponse(['customerid' => null]);

        $this->assertIsInt($response->customerId());
        $this->assertEquals(0, $response->customerId());

        $response = new GetResponse([]);

        $this->assertIsInt($response->customerId());
        $this->assertEquals(0, $response->customerId());
    }

    public function testIsImmediateReseller(): void
    {
        $response = new GetResponse(['isImmediateReseller' => true]);

        $this->assertIsBool($response->isImmediateReseller());
        $this->assertTrue($response->isImmediateReseller());

        $response = new GetResponse(['isImmediateReseller' => false]);

        $this->assertIsBool($response->isImmediateReseller());
        $this->assertFalse($response->isImmediateReseller());

        $response = new GetResponse(['isImmediateReseller' => null]);

        $this->assertIsBool($response->isImmediateReseller());
        $this->assertFalse($response->isImmediateReseller());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isImmediateReseller());
        $this->assertFalse($response->isImmediateReseller());
    }

    public function testResellerParentId(): void
    {
        $response = new GetResponse(['parentkey' => '999999999_999999998_000000']);

        $this->assertIsString($response->resellerParentId());
        $this->assertEquals('999999999_999999998_000000', $response->resellerParentId());

        $response = new GetResponse(['parentkey' => null]);

        $this->assertIsString($response->resellerParentId());
        $this->assertEquals('', $response->resellerParentId());

        $response = new GetResponse([]);

        $this->assertIsString($response->resellerParentId());
        $this->assertEquals('', $response->resellerParentId());
    }

    public function testIsPrivacyProtectionAllowed(): void
    {
        $response = new GetResponse(['privacyprotectedallowed' => true]);

        $this->assertIsBool($response->isPrivacyProtectionAllowed());
        $this->assertTrue($response->isPrivacyProtectionAllowed());

        $response = new GetResponse(['privacyprotectedallowed' => false]);

        $this->assertIsBool($response->isPrivacyProtectionAllowed());
        $this->assertFalse($response->isPrivacyProtectionAllowed());

        $response = new GetResponse(['privacyprotectedallowed' => null]);

        $this->assertIsBool($response->isPrivacyProtectionAllowed());
        $this->assertFalse($response->isPrivacyProtectionAllowed());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isPrivacyProtectionAllowed());
        $this->assertFalse($response->isPrivacyProtectionAllowed());
    }

    public function testIsPrivacyProtected(): void
    {
        $response = new GetResponse(['isprivacyprotected' => true]);

        $this->assertIsBool($response->isPrivacyProtected());
        $this->assertTrue($response->isPrivacyProtected());

        $response = new GetResponse(['isprivacyprotected' => false]);

        $this->assertIsBool($response->isPrivacyProtected());
        $this->assertFalse($response->isPrivacyProtected());

        $response = new GetResponse(['isprivacyprotected' => null]);

        $this->assertIsBool($response->isPrivacyProtected());
        $this->assertFalse($response->isPrivacyProtected());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isPrivacyProtected());
        $this->assertFalse($response->isPrivacyProtected());
    }

    public function testIsDeletionAllowed(): void
    {
        $response = new GetResponse(['allowdeletion' => true]);

        $this->assertIsBool($response->isDeletionAllowed());
        $this->assertTrue($response->isDeletionAllowed());

        $response = new GetResponse(['allowdeletion' => false]);

        $this->assertIsBool($response->isDeletionAllowed());
        $this->assertFalse($response->isDeletionAllowed());

        $response = new GetResponse(['allowdeletion' => null]);

        $this->assertIsBool($response->isDeletionAllowed());
        $this->assertFalse($response->isDeletionAllowed());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isDeletionAllowed());
        $this->assertFalse($response->isDeletionAllowed());
    }

    public function testIsSuspendedUponExpiry(): void
    {
        $response = new GetResponse(['isOrderSuspendedUponExpiry' => true]);

        $this->assertIsBool($response->isSuspendedUponExpiry());
        $this->assertTrue($response->isSuspendedUponExpiry());

        $response = new GetResponse(['isOrderSuspendedUponExpiry' => false]);

        $this->assertIsBool($response->isSuspendedUponExpiry());
        $this->assertFalse($response->isSuspendedUponExpiry());

        $response = new GetResponse(['isOrderSuspendedUponExpiry' => null]);

        $this->assertIsBool($response->isSuspendedUponExpiry());
        $this->assertFalse($response->isSuspendedUponExpiry());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isSuspendedUponExpiry());
        $this->assertFalse($response->isSuspendedUponExpiry());
    }

    public function testIsSuspendedByParent(): void
    {
        $response = new GetResponse(['orderSuspendedByParent' => true]);

        $this->assertIsBool($response->isSuspendedByParent());
        $this->assertTrue($response->isSuspendedByParent());

        $response = new GetResponse(['orderSuspendedByParent' => false]);

        $this->assertIsBool($response->isSuspendedByParent());
        $this->assertFalse($response->isSuspendedByParent());

        $response = new GetResponse(['orderSuspendedByParent' => null]);

        $this->assertIsBool($response->isSuspendedByParent());
        $this->assertFalse($response->isSuspendedByParent());

        $response = new GetResponse([]);

        $this->assertIsBool($response->isSuspendedByParent());
        $this->assertFalse($response->isSuspendedByParent());
    }

    public function testDomainSecret(): void
    {
        $response = new GetResponse(['domsecret' => 'abc123']);

        $this->assertIsString($response->domainSecret());
        $this->assertEquals('abc123', $response->domainSecret());

        $response = new GetResponse(['domsecret' => null]);

        $this->assertIsString($response->domainSecret());
        $this->assertEquals('', $response->domain());

        $response = new GetResponse([]);

        $this->assertIsString($response->domainSecret());
        $this->assertEquals('', $response->domainSecret());
    }

    public function testNamedServers(): void
    {
        $response = new GetResponse([
            'noOfNameServers' => 2,
            'ns1'             => 'ns1.test.example.com',
            'ns2'             => 'ns2.test.example.com',
            'cns'             => [
                'ns3.test.example.com',
            ],
        ]);

        $this->assertInstanceOf(NamedServers::class, $response->namedServers());
        $this->assertEquals(2, $response->namedServers()->numberOfServers());
        $this->assertEquals('ns1.test.example.com', $response->namedServers()->namedServer1());
        $this->assertEquals('ns2.test.example.com', $response->namedServers()->namedServer2());
        $this->assertEquals('ns3.test.example.com', $response->namedServers()->childNamedServer());
    }

    public function testRegistrantContact(): void
    {
        $response = new GetResponse([
            'registrantcontact'  => [
                'company'       => 'Test Company',
                'parentkey'     => '999999999_999999998_000000',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'testy.mctest@example.com',
                'address3'      => 'Address line 3',
                'address2'      => 'Address line 2',
                'contactstatus' => 'Active',
                'address1'      => 'Address line 1',
                'contactid'     => '56789',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'EX3 5MP',
                'customerid'    => '12345',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Testy McTest',
                'telno' => '1130000000',
            ],
        ]);

        $this->assertInstanceOf(Contact::class, $response->registrantContact());
        $this->assertEquals(56789, $response->registrantContact()->id());
        $this->assertEquals(12345, $response->registrantContact()->customerId());
        $this->assertEquals('999999999_999999998_000000', $response->registrantContact()->parentId());
        $this->assertEquals('Testy McTest', $response->registrantContact()->name());
        $this->assertEquals('testy.mctest@example.com', (string) $response->registrantContact()->email());
        $this->assertEquals('44', $response->registrantContact()->telephoneNumber()->diallingCode());
        $this->assertEquals('1130000000', $response->registrantContact()->telephoneNumber()->number());
        $this->assertEquals('Test Company', $response->registrantContact()->address()->company());
        $this->assertEquals('Address Line 1', $response->registrantContact()->address()->addressLine1());
        $this->assertEquals('Address Line 2', $response->registrantContact()->address()->addressLine2());
        $this->assertEquals('Address Line 3', $response->registrantContact()->address()->addressLine3());
        $this->assertEquals('Leeds', $response->registrantContact()->address()->city());
        $this->assertEquals('West Yorkshire', $response->registrantContact()->address()->county());
        $this->assertEquals('Gb', $response->registrantContact()->address()->country());
        $this->assertEquals('EX3 5MP', $response->registrantContact()->address()->postCode());
    }

    public function testAdminContact(): void
    {
        $response = new GetResponse([
            'admincontact'  => [
                'company'       => 'Test Company',
                'parentkey'     => '999999999_999999998_000000',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'testy.mctest@example.com',
                'address3'      => 'Address line 3',
                'address2'      => 'Address line 2',
                'contactstatus' => 'Active',
                'address1'      => 'Address line 1',
                'contactid'     => '56789',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'EX3 5MP',
                'customerid'    => '12345',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Testy McTest',
                'telno' => '1130000000',
            ],
        ]);

        $this->assertInstanceOf(Contact::class, $response->adminContact());
        $this->assertEquals(56789, $response->adminContact()->id());
        $this->assertEquals(12345, $response->adminContact()->customerId());
        $this->assertEquals('999999999_999999998_000000', $response->adminContact()->parentId());
        $this->assertEquals('Testy McTest', $response->adminContact()->name());
        $this->assertEquals('testy.mctest@example.com', (string) $response->adminContact()->email());
        $this->assertEquals('44', $response->adminContact()->telephoneNumber()->diallingCode());
        $this->assertEquals('1130000000', $response->adminContact()->telephoneNumber()->number());
        $this->assertEquals('Test Company', $response->adminContact()->address()->company());
        $this->assertEquals('Address Line 1', $response->adminContact()->address()->addressLine1());
        $this->assertEquals('Address Line 2', $response->adminContact()->address()->addressLine2());
        $this->assertEquals('Address Line 3', $response->adminContact()->address()->addressLine3());
        $this->assertEquals('Leeds', $response->adminContact()->address()->city());
        $this->assertEquals('West Yorkshire', $response->adminContact()->address()->county());
        $this->assertEquals('Gb', $response->adminContact()->address()->country());
        $this->assertEquals('EX3 5MP', $response->adminContact()->address()->postCode());
    }

    public function testTechnicalContact(): void
    {
        $response = new GetResponse([
            'techcontact'  => [
                'company'       => 'Test Company',
                'parentkey'     => '999999999_999999998_000000',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'testy.mctest@example.com',
                'address3'      => 'Address line 3',
                'address2'      => 'Address line 2',
                'contactstatus' => 'Active',
                'address1'      => 'Address line 1',
                'contactid'     => '56789',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'EX3 5MP',
                'customerid'    => '12345',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Testy McTest',
                'telno' => '1130000000',
            ],
        ]);

        $this->assertInstanceOf(Contact::class, $response->technicalContact());
        $this->assertEquals(56789, $response->technicalContact()->id());
        $this->assertEquals(12345, $response->technicalContact()->customerId());
        $this->assertEquals('999999999_999999998_000000', $response->technicalContact()->parentId());
        $this->assertEquals('Testy McTest', $response->technicalContact()->name());
        $this->assertEquals('testy.mctest@example.com', (string) $response->technicalContact()->email());
        $this->assertEquals('44', $response->technicalContact()->telephoneNumber()->diallingCode());
        $this->assertEquals('1130000000', $response->technicalContact()->telephoneNumber()->number());
        $this->assertEquals('Test Company', $response->technicalContact()->address()->company());
        $this->assertEquals('Address Line 1', $response->technicalContact()->address()->addressLine1());
        $this->assertEquals('Address Line 2', $response->technicalContact()->address()->addressLine2());
        $this->assertEquals('Address Line 3', $response->technicalContact()->address()->addressLine3());
        $this->assertEquals('Leeds', $response->technicalContact()->address()->city());
        $this->assertEquals('West Yorkshire', $response->technicalContact()->address()->county());
        $this->assertEquals('Gb', $response->technicalContact()->address()->country());
        $this->assertEquals('EX3 5MP', $response->technicalContact()->address()->postCode());
    }

    public function testBillingContact(): void
    {
        $response = new GetResponse([
            'billingcontact'  => [
                'company'       => 'Test Company',
                'parentkey'     => '999999999_999999998_000000',
                'state'         => 'West Yorkshire',
                'telnocc'       => '44',
                'emailaddr'     => 'testy.mctest@example.com',
                'address3'      => 'Address line 3',
                'address2'      => 'Address line 2',
                'contactstatus' => 'Active',
                'address1'      => 'Address line 1',
                'contactid'     => '56789',
                'type'          => 'Contact',
                'city'          => 'Leeds',
                'country'       => 'GB',
                'zip'           => 'EX3 5MP',
                'customerid'    => '12345',
                'contacttype'   => [
                    'dotin',
                ],
                'name'  => 'Testy McTest',
                'telno' => '1130000000',
            ],
        ]);

        $this->assertInstanceOf(Contact::class, $response->billingContact());
        $this->assertEquals(56789, $response->billingContact()->id());
        $this->assertEquals(12345, $response->billingContact()->customerId());
        $this->assertEquals('999999999_999999998_000000', $response->billingContact()->parentId());
        $this->assertEquals('Testy McTest', $response->billingContact()->name());
        $this->assertEquals('testy.mctest@example.com', (string) $response->billingContact()->email());
        $this->assertEquals('44', $response->billingContact()->telephoneNumber()->diallingCode());
        $this->assertEquals('1130000000', $response->billingContact()->telephoneNumber()->number());
        $this->assertEquals('Test Company', $response->billingContact()->address()->company());
        $this->assertEquals('Address Line 1', $response->billingContact()->address()->addressLine1());
        $this->assertEquals('Address Line 2', $response->billingContact()->address()->addressLine2());
        $this->assertEquals('Address Line 3', $response->billingContact()->address()->addressLine3());
        $this->assertEquals('Leeds', $response->billingContact()->address()->city());
        $this->assertEquals('West Yorkshire', $response->billingContact()->address()->county());
        $this->assertEquals('Gb', $response->billingContact()->address()->country());
        $this->assertEquals('EX3 5MP', $response->billingContact()->address()->postCode());
    }

    public function testGdprProtection(): void
    {
        $response = new GetResponse([
            'gdpr' => [
                'enabled'  => true,
                'eligible' => false,
            ],
        ]);

        $this->assertInstanceOf(GdprProtection::class, $response->gdprProtection());
        $this->assertTrue($response->gdprProtection()->enabled());
        $this->assertFalse($response->gdprProtection()->eligible());
    }

    public function testRegistrantContactVerification(): void
    {
        $response = new GetResponse([
            'raaVerificationStatus'    => 'Pending',
            'raaVerificationStartTime' => '1547563773',
        ]);

        $this->assertInstanceOf(RegistrantContactVerification::class, $response->registrantContactVerification());
        $this->assertEquals('Pending', $response->registrantContactVerification()->status());
        $this->assertEquals(
            Carbon::createFromTimestamp(1547563773),
            $response->registrantContactVerification()->verificationProcessStartTime()
        );
    }

    public function testPrivacyProtection(): void
    {
        $response = new GetResponse([
            'privacyprotectendtime'     => '1547565748',
            'privacy-registrantcontact' => 'registrant',
            'privacy-admincontact'      => 'admin',
            'privacy-billingcontact'    => 'billing',
        ]);

        $this->assertInstanceOf(PrivacyProtection::class, $response->privacyProtection());
        $this->assertEquals(Carbon::createFromTimestamp(1547565748), $response->privacyProtection()->expiry());
        $this->assertEquals('registrant', $response->privacyProtection()->registrantContact());
        $this->assertEquals('admin', $response->privacyProtection()->adminContact());
        $this->assertEquals('billing', $response->privacyProtection()->billingContact());
    }

    public function testDelegationSigner(): void
    {
        $response = new GetResponse([
            'dnssec' => [
                'keytag'     => 'some-key-tag',
                'algorithm'  => 'RSA-SHA256',
                'digest'     => 'some-digest',
                'digesttype' => 'SHA-256',
            ],
        ]);

        $this->assertInstanceOf(DelegationSigner::class, $response->delegationSigner());
        $this->assertEquals('some-key-tag', $response->delegationSigner()->keyTag());
        $this->assertEquals('RSA-SHA256', $response->delegationSigner()->algorithm());
        $this->assertEquals('some-digest', $response->delegationSigner()->digest());
        $this->assertEquals('SHA-256', $response->delegationSigner()->digestType());
    }

    public function testRecurring(): void
    {
        $response = new GetResponse([
            'recurring' => true,
        ]);

        $this->assertIsBool($response->recurring());
        $this->assertTrue($response->recurring());

        $response = new GetResponse([
            'recurring' => false,
        ]);
        $this->assertFalse($response->recurring());

        $response = new GetResponse([]);
        $this->assertFalse($response->recurring());
    }

    public function testCustomerCost(): void
    {
        $response = new GetResponse(['customercost' => '0.0']);

        $this->assertIsFloat($response->customerCost());
        $this->assertEquals('0.00', $response->customerCost());
    }

    public function testMoneyBackPeriod(): void
    {
        $response = new GetResponse(['moneybackperiod' => 30]);

        $this->assertIsInt($response->moneyBackPeriod());
        $this->assertEquals(30, $response->moneyBackPeriod());
    }

    public function testResellerCost(): void
    {
        $response = new GetResponse(['resellercost' => '0.0']);

        $this->assertIsFloat($response->resellerCost());
        $this->assertEquals('0.00', $response->resellerCost());
    }

    public function testJumpConditions(): void
    {
        $response = new GetResponse(['jumpConditions' => []]);
        $this->assertIsArray($response->jumpConditions());
    }

    public function testPaused(): void
    {
        $response = new GetResponse(['paused' => true]);
        $this->assertIsBool($response->paused());
        $this->assertTrue($response->paused());

        $response = new GetResponse(['paused' => false]);
        $this->assertIsBool($response->paused());
        $this->assertFalse($response->paused());
    }

    public function testEaqId(): void
    {
        $response = new GetResponse(['eaqid' => 0]);

        $this->assertIsInt($response->eaqId());
        $this->assertEquals(0, $response->eaqId());
    }

    public function testEntityTypeId(): void
    {
        $response = new GetResponse(['entitytypeid' => 283]);

        $this->assertIsInt($response->entityTypeId());
        $this->assertEquals(283, $response->entityTypeId());
    }

    public function testActionCompleted(): void
    {
        $response = new GetResponse(['actioncompleted' => '0']);

        $this->assertIsString($response->actionCompleted());
        $this->assertEquals('0', $response->actionCompleted());
    }

    public function testAutoRenewAttemptDuration(): void
    {
        $response = new GetResponse(['actioncompleted' => '0']);

        $this->assertIsInt($response->autoRenewAttemptDuration());
        $this->assertEquals('0', $response->autoRenewAttemptDuration());
    }

    public function testAutoRenewTermType(): void
    {
        $response = new GetResponse(['autoRenewTermType' => 'LONG_TERM']);

        $this->assertIsString($response->autoRenewTermType());
        $this->assertEquals('LONG_TERM', $response->autoRenewTermType());
    }
}
