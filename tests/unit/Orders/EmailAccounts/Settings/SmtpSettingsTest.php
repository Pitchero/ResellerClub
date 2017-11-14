<?php

namespace ResellerClub\Orders\BusinessEmails\Settings\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailAccounts\Settings\SmtpSettings;

class SmtpSettingsTest extends TestCase
{
    public function testImapSettings()
    {
        $smtpSettings = new SmtpSettings('smtp.somedomain.co.in.onlyfordemo.com');

        $this->assertEquals('smtp.somedomain.co.in.onlyfordemo.com', (string) $smtpSettings);
    }
}
