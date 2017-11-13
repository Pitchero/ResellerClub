<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAccountSettings;

class EmailAccountSettingsTest extends TestCase
{
    public function testPop()
    {
        $this->assertEquals(
            'pop.somedomain.co.in.onlyfordemo.com',
            $this->emailAccountSettings->popSettings()
        );
    }

    public function testImap()
    {
        $this->assertEquals(
            'imap.somedomain.co.in.onlyfordemo.com',
            $this->emailAccountSettings->imapSettings()
        );
    }

    public function testSmtp()
    {
        $this->assertEquals(
            'smtp.somedomain.co.in.onlyfordemo.com',
            $this->emailAccountSettings->smtpSettings()
        );
    }

    public function testWebmail()
    {
        $this->assertEquals(
            'http://webmail.somedomain.co.in.onlyfordemo.com',
            $this->emailAccountSettings->webmailUrl()
        );
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
