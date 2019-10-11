<?php

namespace Tests\Unit\Orders\EmailAccounts\Responses;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Orders\EmailAccounts\Responses\CreateResponse;
use ResellerClub\Orders\EmailAccounts\Settings\ImapSettings;
use ResellerClub\Orders\EmailAccounts\Settings\PopSettings;
use ResellerClub\Orders\EmailAccounts\Settings\SmtpSettings;
use ResellerClub\Orders\EmailAccounts\Settings\WebmailUrlSettings;
use ResellerClub\Status;

class CreateResponseTest extends TestCase
{
    public function testResponseExceptionThrownWhenValidationErrorIsReturn(): void
    {
        try {
            new CreateResponse(['response' => [
                'status'    => 'FAILURE',
                'message'   => 'Email address is already registered with us',
                'errorCode' => 'emailaddress_unique_key_voilation',
            ]]);
        } catch (ResponseException $e) {
            $this->assertEquals('Email address is already registered with us', $e->getMessage());

            return;
        }

        $this->fail('The missing attribute exception was not thrown for the user.');
    }

    public function testMissingAttributeExceptionThrownWhenUserNotSetInResponse(): void
    {
        try {
            new CreateResponse([
                'response' => [
                    'status' => 'SUCCESS',
                ],
            ]);
        } catch (MissingAttributeException $e) {
            $this->assertEquals('Expected attribute [user] was not in response.', $e->getMessage());

            return;
        }

        $this->fail('The missing attribute exception was not thrown for the user.');
    }

    public function testStatus(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [],
            ],
        ]);

        $this->assertInstanceOf(Status::class, $response->status());
        $this->assertEquals('success', (string) $response->status());
    }

    public function testStatusNotSetInResponse(): void
    {
        try {
            $response = new CreateResponse([
                'response' => [
                    'user' => [],
                ],
            ]);
            $response->status();
        } catch (MissingAttributeException $e) {
            $this->assertEquals('Expected attribute [status] was not in response.', $e->getMessage());

            return;
        }

        $this->fail('The missing attribute exception was not thrown for the status.');
    }

    public function testEmail(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'emailAddress' => 'john.does@some-domain.co.uk',
                ],
            ],
        ]);

        $this->assertInstanceOf(EmailAddress::class, $response->email());
        $this->assertEquals('john.does@some-domain.co.uk', (string) $response->email());
    }

    public function testDomain(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'domainName' => 'some-domain.co.uk',
                ],
            ],
        ]);

        $this->assertIsString($response->domain());
        $this->assertEquals('some-domain.co.uk', $response->domain());
    }

    public function testFirstName(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'firstName' => 'John',
                ],
            ],
        ]);

        $this->assertIsString($response->firstName());
        $this->assertEquals('John', $response->firstName());
    }

    public function testLastName(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'lastName' => 'Doe',
                ],
            ],
        ]);

        $this->assertIsString($response->lastName());
        $this->assertEquals('Doe', $response->lastName());
    }

    public function testNotificationsEmail(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'alternateEmailAddress' => 'another-email@some-domain.co.uk',
                ],
            ],
        ]);

        $this->assertInstanceOf(EmailAddress::class, $response->notificationsEmail());
        $this->assertEquals('another-email@some-domain.co.uk', (string) $response->notificationsEmail());
    }

    public function testInternalForwards(): void
    {
        $expected_result = 'new:somedomain.co.in.onlyfordemo.com@set25.mss.mailhostbox.aus-tx.colo';

        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'internalForwards' => $expected_result,
                ],
            ],
        ]);

        $this->assertIsString($response->internalForwards());
        $this->assertEquals($expected_result, $response->internalForwards());
    }

    public function testQuotaLimit(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'quotaLimit' => 5242880,
                ],
            ],
        ]);

        $this->assertIsInt($response->quotaLimit());
        $this->assertEquals(5242880, $response->quotaLimit());
    }

    public function testAccountStatus(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'status' => 'ACTIVE',
                ],
            ],
        ]);

        $this->assertIsString($response->accountStatus());
        $this->assertEquals('active', $response->accountStatus());
    }

    public function testAccountType(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'accountType' => 'POP_WITHOUT_AUTORESPONDER',
                ],
            ],
        ]);

        $this->assertIsString($response->accountType());
        $this->assertEquals('POP_WITHOUT_AUTORESPONDER', $response->accountType());
    }

    public function testQuotaUsed(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'quotaUsed' => 0,
                ],
            ],
        ]);

        $this->assertIsInt($response->quotaUsed());
        $this->assertEquals(0, $response->quotaUsed());
    }

    public function testCountryCode(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'countryCode' => 'US',
                ],
            ],
        ]);

        $this->assertIsString($response->countryCode());
        $this->assertEquals('US', $response->countryCode());
    }

    public function testPercentageQuotaUsage(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'percentageQuotaUsage' => 0,
                ],
            ],
        ]);

        $this->assertIsFloat($response->percentageQuotaUsage());
        $this->assertEquals(0, $response->percentageQuotaUsage());
    }

    public function testLanguageCode(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'languageCode' => 'en',
                ],
            ],
        ]);

        $this->assertIsString($response->languageCode());
        $this->assertEquals('en', $response->languageCode());
    }

    public function testAccountSettings(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'accountSettings' => [
                        'popSettings'  => 'pop.somedomain.co.in.onlyfordemo.com',
                        'imapSettings' => 'imap.somedomain.co.in.onlyfordemo.com',
                        'smtpSettings' => 'smtp.somedomain.co.in.onlyfordemo.com',
                        'webmailUrl'   => 'http://webmail.somedomain.co.in.onlyfordemo.com',
                    ],
                ],
            ],
        ]);

        $accountSettings = $response->accountSettings();

        $this->assertIsArray($accountSettings);
        $this->assertCount(4, $accountSettings);

        $this->assertArrayHasKey('pop', $accountSettings);
        $this->assertArrayHasKey('imap', $accountSettings);
        $this->assertArrayHasKey('smtp', $accountSettings);
        $this->assertArrayHasKey('webmail', $accountSettings);

        $this->assertInstanceOf(PopSettings::class, $accountSettings['pop']);
        $this->assertInstanceOf(ImapSettings::class, $accountSettings['imap']);
        $this->assertInstanceOf(SmtpSettings::class, $accountSettings['smtp']);
        $this->assertInstanceOf(WebmailUrlSettings::class, $accountSettings['webmail']);
    }

    public function testCreatedOn(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'createdOn' => '2017-11-10 17:45:17.988 GMT',
                ],
            ],
        ]);

        $this->assertInstanceOf(Carbon::class, $response->createdOn());
        $this->assertEquals('2017-11-10 17:45:17', $response->createdOn()->format('Y-m-d H:i:s'));
    }

    public function testPopAccessEnabled(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'popAccessEnabled' => true,
                ],
            ],
        ]);

        $this->assertIsBool($response->popAccessEnabled());
        $this->assertTrue($response->popAccessEnabled());
    }

    public function testImapAccessEnabled(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'imapAccessEnabled' => true,
                ],
            ],
        ]);

        $this->assertIsBool($response->imapAccessEnabled());
        $this->assertTrue($response->imapAccessEnabled());
    }

    public function testWebmailAccessEnabled(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'webmailAccessEnabled' => true,
                ],
            ],
        ]);

        $this->assertIsBool($response->webmailAccessEnabled());
        $this->assertTrue($response->webmailAccessEnabled());
    }

    public function testCanFooterOptout(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'canFooterOptout' => false,
                ],
            ],
        ]);

        $this->assertIsBool($response->canFooterOptout());
        $this->assertFalse($response->canFooterOptout());
    }

    public function testRevertBlacklistRequestExists(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'revertBlacklistRequestExists' => false,
                ],
            ],
        ]);

        $this->assertIsBool($response->revertBlacklistRequestExists());
        $this->assertFalse($response->revertBlacklistRequestExists());
    }

    public function testConfigurationProfile(): void
    {
        $response = new CreateResponse([
            'response' => [
                'status' => 'SUCCESS',
                'user'   => [
                    'configurationProfile' => 'EELITE',
                ],
            ],
        ]);

        $this->assertIsString($response->configurationProfile());
        $this->assertEquals('EELITE', $response->configurationProfile());
    }
}
