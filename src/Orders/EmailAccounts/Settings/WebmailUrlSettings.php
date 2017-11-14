<?php

namespace ResellerClub\Orders\EmailAccounts\Settings;

class WebmailUrlSettings
{
    /**
     * @var string
     */
    protected $webmailUrl;

    /**
     * Create a new email account settings instance.
     *
     * @param string $webmailUrl
     */
    public function __construct(string $webmailUrl)
    {
        $this->webmailUrl = $webmailUrl;
    }

    /**
     * Get the webmail URL address.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->webmailUrl;
    }
}
