<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAccountSettings;

class EmailAccountSettingsTest extends TestCase
{
    public function testPop()
    {
        $this->assertEquals('pop.somedomain.co.in.onlyfordemo.com', $this->emailAccountSettings->pop());
    }

    public function testImap()
    {
        $this->assertEquals('imap.somedomain.co.in.onlyfordemo.com', $this->emailAccountSettings->imap());
    }

    public function testSmpt()
    {
        $this->assertEquals('smtp.somedomain.co.in.onlyfordemo.com', $this->emailAccountSettings->smtp());
    }

    public function testWebmail()
    {
        $this->assertEquals('http://webmail.somedomain.co.in.onlyfordemo.com', $this->emailAccountSettings->webmail());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->emailAccountSettings = new EmailAccountSettings(
            $popSettings = 'pop.somedomain.co.in.onlyfordemo.com',
            $imapSettings = 'imap.somedomain.co.in.onlyfordemo.com',
            $smtpSettings = 'smtp.somedomain.co.in.onlyfordemo.com',
            $webmailUrl = 'http://webmail.somedomain.co.in.onlyfordemo.com'
        );
    }
}
