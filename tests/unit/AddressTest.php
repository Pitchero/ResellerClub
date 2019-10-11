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

    protected function setUp(): void
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

    public function testCompany(): void
    {
        $this->assertIsString($this->address->company());
        $this->assertEquals('Company Name', $this->address->company());
    }

    public function testAddressLine1(): void
    {
        $this->assertIsString($this->address->addressLine1());
        $this->assertEquals('Address Line 1', $this->address->addressLine1());
    }

    public function testAddressLine2(): void
    {
        $this->assertIsString($this->address->addressLine2());
        $this->assertEquals('Address Line 2', $this->address->addressLine2());
    }

    public function testAddressLine3(): void
    {
        $this->assertIsString($this->address->addressLine3());
        $this->assertEquals('Address Line 3', $this->address->addressLine3());
    }

    public function testCity(): void
    {
        $this->assertIsString($this->address->city());
        $this->assertEquals('Leeds', $this->address->city());
    }

    public function testCounty(): void
    {
        $this->assertIsString($this->address->county());
        $this->assertEquals('West Yorkshire', $this->address->county());
    }

    public function testCountry(): void
    {
        $this->assertIsString($this->address->country());
        $this->assertEquals('Gb', $this->address->country());
    }

    public function testPostCode(): void
    {
        $this->assertIsString($this->address->postCode());
        $this->assertEquals('LS1 1AB', $this->address->postCode());
    }
}
