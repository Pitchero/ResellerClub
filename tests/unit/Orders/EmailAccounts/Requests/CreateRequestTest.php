<?php

namespace Tests\Unit\Orders\EmailAccounts\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailAccounts\Requests\CreateRequest;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\Order;

class CreateRequestTest extends TestCase
{
    /**
     * @var CreateRequest
     */
    private $request;

    protected function setUp()
    {
        parent::setUp();

        $email = new EmailAddress('john.doe@my-domain.co.uk');
        $notificationsEmail = new EmailAddress('alternative@test.com');

        $this->request = new CreateRequest(
            new Order($id = 123),
            $email,
            $password = 'myT35tP@55word',
            $notificationsEmail,
            $firstName = 'John',
            $lastName = 'Doe',
            $countryCode = 'US',
            $languageCode = 'en'
        );
    }

    public function testOrderId()
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testEmail()
    {
        $this->assertInstanceOf(EmailAddress::class, $this->request->email());
        $this->assertEquals('john.doe@my-domain.co.uk', (string) $this->request->email());
    }

    public function testPassword()
    {
        $this->assertEquals('myT35tP@55word', $this->request->password());
    }

    public function testNotificationEmail()
    {
        $this->assertInstanceOf(EmailAddress::class, $this->request->notificationEmail());
        $this->assertEquals('alternative@test.com', (string) $this->request->notificationEmail());
    }

    public function testFirstName()
    {
        $this->assertEquals('John', $this->request->firstName());
    }

    public function testLastName()
    {
        $this->assertEquals('Doe', $this->request->lastName());
    }

    public function testCountryCode()
    {
        $this->assertEquals('US', $this->request->countryCode());
    }

    public function testLanguageCode()
    {
        $this->assertEquals('en', $this->request->languageCode());
    }
}
