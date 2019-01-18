<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Address;

class AddressTest extends TestCase
{
    /**
     * @var Address
     */
    private $address;

    protected function setUp()
    {
        parent::setUp();
        $this->address = new Address(
            $company = 'ComPAny name',
            $addressLine1 = 'address LINE 1',
            $addressLine2 = 'ADDRESS line 2',
            $addressLine3 = 'AddrESs LiNe 3',
            $city = 'lEEds',
            $county = 'West yorkSHire',
            $country = 'GB',
            $postCode = 'LS1 1aB'
        );
    }

    public function testCompany()
    {
        $this->assertInternalType('string', $this->address->company());
        $this->assertEquals('Company Name', $this->address->company());
    }

    public function testAddressLine1()
    {
        $this->assertInternalType('string', $this->address->addressLine1());
        $this->assertEquals('Address Line 1', $this->address->addressLine1());
    }

    public function testAddressLine2()
    {
        $this->assertInternalType('string', $this->address->addressLine2());
        $this->assertEquals('Address Line 2', $this->address->addressLine2());
    }

    public function testAddressLine3()
    {
        $this->assertInternalType('string', $this->address->addressLine3());
        $this->assertEquals('Address Line 3', $this->address->addressLine3());
    }

    public function testCity()
    {
        $this->assertInternalType('string', $this->address->city());
        $this->assertEquals('Leeds', $this->address->city());
    }

    public function testCounty()
    {
        $this->assertInternalType('string', $this->address->county());
        $this->assertEquals('West Yorkshire', $this->address->county());
    }

    public function testCountry()
    {
        $this->assertInternalType('string', $this->address->country());
        $this->assertEquals('Gb', $this->address->country());
    }

    public function testPostCode()
    {
        $this->assertInternalType('string', $this->address->postCode());
        $this->assertEquals('LS1 1AB', $this->address->postCode());
    }
}
