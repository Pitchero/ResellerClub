<?php

namespace Tests\Unit\Orders\EmailAccounts\Settings;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailAccounts\Settings\SmtpSettings;

class SmtpSettingsTest extends TestCase
{
    public function testImapSettings(): void
    {
        $smtpSettings = new SmtpSettings('smtp.somedomain.co.in.onlyfordemo.com');

        $this->assertEquals('smtp.somedomain.co.in.onlyfordemo.com', (string) $smtpSettings);
    }
}
