<?php

namespace ResellerClub\Orders\EmailAccounts\Responses;

use Carbon\Carbon;
use ResellerClub\EmailAddress;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Exceptions\ResponseException;
use ResellerClub\Orders\EmailAccounts\Settings\ImapSettings;
use ResellerClub\Orders\EmailAccounts\Settings\PopSettings;
use ResellerClub\Orders\EmailAccounts\Settings\SmtpSettings;
use ResellerClub\Orders\EmailAccounts\Settings\WebmailUrlSettings;
use ResellerClub\Response;
use ResellerClub\Status;

/**
 * @see https://manage.resellerclub.com/kb/answer/1037
 */
class CreateResponse extends Response
{
    /**
     * @var array
     */
    private $user;

    /**
     * The created email account user.
     *
     * @param array $attributes
     *
     * @throws MissingAttributeException
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Not all responses contain a status it would seem, for example get business email.
        if (!$this->wasSuccessful()) {
            throw new ResponseException($this->response['message']);
        }

        if (!array_key_exists('user', $this->response)) {
            throw new MissingAttributeException('user');
        }

        $this->user = $this->response['user'];
    }

    /**
     * Get the user status.
     *
     * @throws MissingAttributeException
     *
     * @return Status
     */
    public function status(): Status
    {
        if (!array_key_exists('status', $this->response)) {
            throw new MissingAttributeException('status');
        }

        return new Status($this->response['status']);
    }

    /**
     * Gets the newly created email address.
     *
     * @return EmailAddress
     */
    public function email(): EmailAddress
    {
        return new EmailAddress($this->user['emailAddress']);
    }

    /**
     * Gets the domain name that this email account has been created for.
     *
     * @return string
     */
    public function domain(): string
    {
        return $this->user['domainName'];
    }

    /**
     * Gets the user's first name for the email account created.
     *
     * @return string
     */
    public function firstName(): string
    {
        return $this->user['firstName'];
    }

    /**
     * Gets the user's last name for the email account created.
     *
     * @return string
     */
    public function lastName(): string
    {
        return $this->user['lastName'];
    }

    /**
     * Gets the user's email address to notify regarding this email account.
     *
     * @return EmailAddress
     */
    public function notificationsEmail(): EmailAddress
    {
        return new EmailAddress($this->user['alternateEmailAddress']);
    }

    /**
     * Gets the information regarding the internal forwarding of the email account.
     *
     * @return string
     */
    public function internalForwards(): string
    {
        return $this->user['internalForwards'];
    }

    /**
     * Gets the email account's quota limit.
     *
     * @return int
     */
    public function quotaLimit(): int
    {
        return $this->user['quotaLimit'];
    }

    /**
     * Gets the status on the email account.
     *
     * @return string
     */
    public function accountStatus(): string
    {
        return strtolower($this->user['status']);
    }

    /**
     * Gets the email account type.
     *
     * @return string
     */
    public function accountType(): string
    {
        return $this->user['accountType'];
    }

    /**
     * Gets the quota used for this email account.
     *
     * @return int
     */
    public function quotaUsed(): int
    {
        return $this->user['quotaUsed'];
    }

    /**
     * Gets the country code.
     *
     * @return string
     */
    public function countryCode(): string
    {
        return $this->user['countryCode'];
    }

    /**
     * Gets the percentage of the quota used for the email account.
     *
     * @return float
     */
    public function percentageQuotaUsage(): float
    {
        return $this->user['percentageQuotaUsage'];
    }

    /**
     * Gets the language code.
     *
     * @return string
     */
    public function languageCode(): string
    {
        return $this->user['languageCode'];
    }

    /**
     * Gets the email account settings.
     *
     * @return array
     */
    public function accountSettings(): array
    {
        return [
            'pop'     => new PopSettings($this->user['accountSettings']['popSettings']),
            'imap'    => new ImapSettings($this->user['accountSettings']['imapSettings']),
            'smtp'    => new SmtpSettings($this->user['accountSettings']['smtpSettings']),
            'webmail' => new WebmailUrlSettings($this->user['accountSettings']['webmailUrl']),
        ];
    }

    /**
     * Gets the date that this email account was created.
     *
     * @return Carbon
     */
    public function createdOn(): Carbon
    {
        return new Carbon($this->user['createdOn']);
    }

    /**
     * Is pop email access enabled.
     *
     * @return bool
     */
    public function popAccessEnabled(): bool
    {
        return $this->user['popAccessEnabled'];
    }

    /**
     * Is imap email access enabled.
     *
     * @return bool
     */
    public function imapAccessEnabled(): bool
    {
        return $this->user['imapAccessEnabled'];
    }

    /**
     * Is webmail email access enabled.
     *
     * @return bool
     */
    public function webmailAccessEnabled(): bool
    {
        return $this->user['webmailAccessEnabled'];
    }

    /**
     * Gets footer opt out.
     *
     * @return bool
     */
    public function canFooterOptout(): bool
    {
        return $this->user['canFooterOptout'];
    }

    /**
     * Gets revert blacklist request exists.
     *
     * @return bool
     */
    public function revertBlacklistRequestExists(): bool
    {
        return $this->user['revertBlacklistRequestExists'];
    }

    /**
     * Gets the configuration profile for the email account.
     *
     * @return string
     */
    public function configurationProfile(): string
    {
        return $this->user['configurationProfile'];
    }
}
