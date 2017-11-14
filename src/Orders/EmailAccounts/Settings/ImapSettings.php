<?php

namespace ResellerClub\Orders\EmailAccounts\Settings;

class ImapSettings
{
    /**
     * @var string
     */
    protected $imapSettings;

    /**
     * Create a new email account settings instance.
     *
     * @param string $imapSettings
     */
    public function __construct(string $imapSettings)
    {
        $this->imapSettings = $imapSettings;
    }

    /**
     * Get the IMAP settings address.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->imapSettings;
    }
}
