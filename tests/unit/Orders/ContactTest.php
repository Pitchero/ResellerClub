<?php

namespace Tests\Unit\Orders;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\Contact;

class ContactTest extends TestCase
{
    /**
     * @var Contact
     */
    private $contact;

    protected function setUp()
    {
        parent::setUp();
        $this->contact = new Contact(
            $id = 123,
            $detail = 'test.mctesting@testing.co.uk'
        );
    }

    public function testId()
    {
        $this->assertInternalType('integer', $this->contact->id());
        $this->assertEquals(123, $this->contact->id());
    }

    public function testDetail()
    {
        $this->assertInternalType('string', $this->contact->detail());
        $this->assertEquals('test.mctesting@testing.co.uk', $this->contact->detail());
    }
}
