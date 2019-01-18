<?php

namespace Tests\Unit\Domains;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Domains\DomainOrderDetailType;

class DomainOrderDetailTypeTest extends TestCase
{
    public function testValidDetailTypes()
    {
        $this->assertInstanceOf(
            DomainOrderDetailType::class,
            DomainOrderDetailType::all()
        );
        $this->assertEquals(
            'All',
            (string) DomainOrderDetailType::all()
        );

        $this->assertInstanceOf(
            DomainOrderDetailType::class,
            DomainOrderDetailType::orderDetails()
        );
        $this->assertEquals(
            'OrderDetails',
            (string) DomainOrderDetailType::orderDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::contactIds());
        $this->assertEquals(
            'ContactIds',
            (string) DomainOrderDetailType::contactIds()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::registrantContactDetails());
        $this->assertEquals(
            'RegistrantContactDetails',
            (string) DomainOrderDetailType::registrantContactDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::adminContactDetails());
        $this->assertEquals(
            'AdminContactDetails',
            (string) DomainOrderDetailType::adminContactDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::technicalContactDetails());
        $this->assertEquals(
            'TechContactDetails',
            (string) DomainOrderDetailType::technicalContactDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::billingContactDetails());
        $this->assertEquals(
            'BillingContactDetails',
            (string) DomainOrderDetailType::billingContactDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::namedServerDetails());
        $this->assertEquals(
            'NsDetails',
            (string) DomainOrderDetailType::namedServerDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::domainStatus());
        $this->assertEquals(
            'DomainStatus',
            (string) DomainOrderDetailType::domainStatus()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::dnsSecurityDetails());
        $this->assertEquals(
            'DNSSECDetails',
            (string) DomainOrderDetailType::dnsSecurityDetails()
        );

        $this->assertInstanceOf(DomainOrderDetailType::class, DomainOrderDetailType::orderStatus());
        $this->assertEquals(
            'StatusDetails',
            (string) DomainOrderDetailType::orderStatus()
        );
    }
}
