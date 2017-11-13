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
     * Get the POP address.
     *
     * @return string
     */
    public function pop(): string
    {
        return $this->popSettings;
    }

    /**
     * Get the IMAP address.
     *
     * @return string
     */
    public function imap(): string
    {
        return $this->imapSettings;
    }

    /**
     * Get the SMTP address.
     *
     * @return string
     */
    public function smtp(): string
    {
        return $this->smtpSettings;
    }

    /**
     * Get the webmail address.
     *
     * @return string
     */
    public function webmail(): string
    {
        return $this->webmailUrl;
    }
}
