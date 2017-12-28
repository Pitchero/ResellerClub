<?php

namespace Tests\Unit\Orders\EmailAccounts;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ResellerClub\Api;
use ResellerClub\Config;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailAccounts\EmailAccount;
use ResellerClub\Orders\EmailAccounts\Requests\CreateRequest;
use ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest;
use ResellerClub\Orders\EmailAccounts\Responses\CreateResponse;
use ResellerClub\Orders\EmailAccounts\Responses\DeletedResponse;
use ResellerClub\Orders\Order;

class EmailAccountTest extends TestCase
{
    public function testResponseFromEmailAccountDelete()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'response' => [
                        'status' => 'Success'
                    ]
                ])
            ),
        ]);

        $emailAccounts = new EmailAccount($this->api($mock));

        $this->assertInstanceOf(
            DeletedResponse::class,
            $emailAccounts->delete(
                new DeleteRequest(
                    new Order($id = 123),
                    new EmailAddress($email = 'john.doe@my-domain.co.uk')
                )
            )
        );
    }

    public function testResponseFromEmailAccountCreate()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'response' => [
                            'status' => 'SUCCESS',
                            'user'   => [
                                'emailAddress'          => 'john.doe@somedomain.co.in.onlyfordemo.com',
                                'domainName'            => 'somedomain.co.in.onlyfordemo.com',
                                'firstName'             => 'John',
                                'lastName'              => 'Doe',
                                'alternateEmailAddress' => 'alternative@test.com',
                                'internalForwards'      => 'new:somedomain.co.in.onlyfordemo.com@set25.mss.mailhostbox.aus-tx.colo',
                                'quotaLimit'            => 5242880,
                                'status'                => 'ACTIVE',
                                'accountType'           => 'POP_WITHOUT_AUTORESPONDER',
                                'quotaUsed'             => 0,
                                'countryCode'           => 'US',
                                'percentageQuotaUsage'  => 0,
                                'languageCode'          => 'en',
                                'accountSettings'       => [
                                    'popSettings'  => 'pop.somedomain.co.in.onlyfordemo.com',
                                    'imapSettings' => 'imap.somedomain.co.in.onlyfordemo.com',
                                    'smtpSettings' => 'smtp.somedomain.co.in.onlyfordemo.com',
                                    'webmailUrl'   => 'http://webmail.somedomain.co.in.onlyfordemo.com',
                                ],
                                'createdOn'                    => '2017-11-10 17:45:17.988 GMT',
                                'popAccessEnabled'             => true,
                                'imapAccessEnabled'            => true,
                                'webmailAccessEnabled'         => true,
                                'canFooterOptout'              => false,
                                'revertBlacklistRequestExists' => false,
                                'configurationProfile'         => 'EELITE',
                            ],
                        ],
                ])
            ),
        ]);

        $emailForwarders = new EmailAccount($this->api($mock));

        $email = new EmailAddress('john.doe@somedomain.co.in.onlyfordemo.com');
        $notificationsEmail = new EmailAddress('alternative@test.com');

        $this->assertInstanceOf(
            CreateResponse::class,
            $emailForwarders->create(
                new CreateRequest(
                    new Order($id = 123),
                    $email,
                    $password = 'myT35tP@55word',
                    $notificationsEmail,
                    $firstName = 'John',
                    $lastName = 'Doe',
                    $countryCode = 'US',
                    $languageCode = 'en'
                )
            )
        );
    }

    private function api(MockHandler $mock): Api
    {
        $handler = HandlerStack::create($mock);

        return new Api(
            new Config(123, 'api_key', true),
            new Client(['handler' => $handler])
        );
    }
}
