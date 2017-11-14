<?php

namespace ResellerClub\Orders\BusinessEmails\Settings\Tests;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailAccounts\Settings\PopSettings;

class PopSettingsTest extends TestCase
{
    public function testPopSettings()
    {
        $popSettings = new PopSettings('pop.somedomain.co.in.onlyfordemo.com');

        $this->assertEquals('pop.somedomain.co.in.onlyfordemo.com', (string) $popSettings);
    }
}
