<?php

namespace ResellerClub;

class EmailAccountSettings
{
    /**
     * @var string
     */
    protected $popSettings;

    /**
     * @var string
     */
    protected $imapSettings;

    /**
     * @var string
     */
    protected $smtpSettings;

    /**
     * @var string
     */
    protected $webmailUrl;

    /**
     * Create a new email account settings instance.
     *
     * @param string $popSettings
     * @param string $imapSettings
     * @param string $smtpSettings
     * @param string $webmailUrl
     */
    public function __construct(
        string $popSettings,
        string $imapSettings,
        string $smtpSettings,
        string $webmailUrl
    ) {
        $this->popSettings = $popSettings;
        $this->imapSettings = $imapSettings;
        $this->smtpSettings = $smtpSettings;
        $this->webmailUrl = $webmailUrl;
    }

    /**
     * Get the POP settings address.
     *
     * @return string
     */
    public function popSettings(): string
    {
        return $this->popSettings;
    }

    /**
     * Get the IMAP settings address.
     *
     * @return string
     */
    public function imapSettings(): string
    {
        return $this->imapSettings;
    }

    /**
     * Get the SMTP settings address.
     *
     * @return string
     */
    public function smtpSettings(): string
    {
        return $this->smtpSettings;
    }

    /**
     * Get the webmail URL address.
     *
     * @return string
     */
    public function webmailUrl(): string
    {
        return $this->webmailUrl;
    }
}
