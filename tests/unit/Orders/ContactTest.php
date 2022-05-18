<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Address;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\Contact;
use ResellerClub\TelephoneNumber;

class ContactTest extends TestCase
{
    /**
     * @var Contact
     */
    private $contact;

    protected function setUp(): void
    {
        parent::setUp();
        $this->contact = new Contact(
            $id = 123,
            $customerId = 456,
            $parentId = '999999999_999999998_715226',
            $name = 'Testy McTest',
            new EmailAddress(
                $email = 'testy.mctest@test.com'
            ),
            new TelephoneNumber(
                $diallingCode = '44',
                $number = '113 000 0000'
            ),
            new Address(
                $company = 'ComPAny name',
                $addressLine1 = 'address LINE 1',
                $addressLine2 = 'ADDRESS line 2',
                $addressLine3 = 'AddrESs LiNe 3',
                $city = 'lEEds',
                $county = 'West yorkSHire',
                $country = 'GB',
                $postCode = 'LS1 1aB'
            )
        );
    }

    public function testId(): void
    {
        $this->assertIsInt($this->contact->id());
        $this->assertEquals(123, $this->contact->id());
    }

    public function testCustomerId(): void
    {
        $this->assertIsInt($this->contact->customerId());
        $this->assertEquals(456, $this->contact->customerId());
    }

    public function testParentId(): void
    {
        $this->assertIsString($this->contact->parentId());
        $this->assertEquals('999999999_999999998_715226', $this->contact->parentId());
    }

    public function testName(): void
    {
        $this->assertIsString($this->contact->name());
        $this->assertEquals('Testy McTest', $this->contact->name());
    }

    public function testEmailAddress(): void
    {
        $this->assertInstanceOf(EmailAddress::class, $this->contact->email());
    }

    public function testTelephoneNumber(): void
    {
        $this->assertInstanceOf(TelephoneNumber::class, $this->contact->telephoneNumber());
    }

    public function testAddress(): void
    {
        $this->assertInstanceOf(Address::class, $this->contact->address());
    }
}
