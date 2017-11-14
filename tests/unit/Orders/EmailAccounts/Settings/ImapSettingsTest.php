<?php

namespace Tests\Unit\Orders\EmailAccounts\Settings;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailAccounts\Settings\ImapSettings;

class ImapSettingsTest extends TestCase
{
    public function testImapSettings()
    {
        $imapSettings = new ImapSettings('imap.somedomain.co.in.onlyfordemo.com');

        $this->assertEquals('imap.somedomain.co.in.onlyfordemo.com', (string) $imapSettings);
    }
}
