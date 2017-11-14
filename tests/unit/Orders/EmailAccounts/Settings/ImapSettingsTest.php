<?php

namespace ResellerClub\Orders\BusinessEmails\Settings\Tests;

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
