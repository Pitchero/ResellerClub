<?php

namespace Tests\Unit\Orders\EmailAccounts\Settings;

use PHPUnit\Framework\TestCase;
use ResellerClub\Orders\EmailAccounts\Settings\PopSettings;

class PopSettingsTest extends TestCase
{
    public function testPopSettings(): void
    {
        $popSettings = new PopSettings('pop.somedomain.co.in.onlyfordemo.com');

        $this->assertEquals('pop.somedomain.co.in.onlyfordemo.com', (string) $popSettings);
    }
}
