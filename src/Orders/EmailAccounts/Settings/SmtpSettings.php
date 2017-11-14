<?php

namespace ResellerClub\Orders\EmailAccounts\Settings;

class SmtpSettings
{
    /**
     * @var string
     */
    protected $smtpSettings;

    /**
     * Create a new email account settings instance.
     *
     * @param string $smtpSettings
     */
    public function __construct(string $smtpSettings)
    {
        $this->smtpSettings = $smtpSettings;
    }

    /**
     * Get the SMTP settings address.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->smtpSettings;
    }
}
