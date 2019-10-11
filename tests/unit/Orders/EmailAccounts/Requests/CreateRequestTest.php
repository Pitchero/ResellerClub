<?php

namespace Tests\Unit\Orders\EmailAccounts\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailAccounts\Requests\CreateRequest;
use ResellerClub\Orders\Order;

class CreateRequestTest extends TestCase
{
    /**
     * @var CreateRequest
     */
    private $request;

    protected function setUp(): void
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

    public function testOrderId(): void
    {
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testEmail(): void
    {
        $this->assertInstanceOf(EmailAddress::class, $this->request->email());
        $this->assertEquals('john.doe@my-domain.co.uk', (string) $this->request->email());
    }

    public function testPassword(): void
    {
        $this->assertEquals('myT35tP@55word', $this->request->password());
    }

    public function testNotificationEmail(): void
    {
        $this->assertInstanceOf(EmailAddress::class, $this->request->notificationEmail());
        $this->assertEquals('alternative@test.com', (string) $this->request->notificationEmail());
    }

    public function testFirstName(): void
    {
        $this->assertEquals('John', $this->request->firstName());
    }

    public function testLastName(): void
    {
        $this->assertEquals('Doe', $this->request->lastName());
    }

    public function testCountryCode(): void
    {
        $this->assertEquals('US', $this->request->countryCode());
    }

    public function testLanguageCode(): void
    {
        $this->assertEquals('en', $this->request->languageCode());
    }
}
