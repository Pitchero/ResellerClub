<?php

namespace ResellerClub\Orders\EmailAccounts\Responses;

use Carbon\Carbon;
use ResellerClub\EmailAccountSettings;
use ResellerClub\EmailAddress;
use ResellerClub\Exceptions\MissingAttributeException;
use ResellerClub\Response;

class CreateResponse extends Response
{
    /**
     * @var array
     */
    private $user;

    /**
     * The created email account user.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @param array $attributes
     *
     * @throws MissingAttributeException
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!array_key_exists('user', $this->response)) {
            throw new MissingAttributeException('user');
        }

        $this->user = $this->response['user'];
    }

    /**
     * Get the user status.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @throws MissingAttributeException
     *
     * @return string
     */
    public function status(): string
    {
        if (!array_key_exists('status', $this->response)) {
            throw new MissingAttributeException('status');
        }

        return strtolower($this->response['status']);
    }

    /**
     * Gets the newly created email address.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return EmailAccountSettings
     */
    public function accountSettings(): EmailAccountSettings
    {
        return new EmailAccountSettings(
            $this->user['accountSettings']['popSettings'],
            $this->user['accountSettings']['imapSettings'],
            $this->user['accountSettings']['smtpSettings'],
            $this->user['accountSettings']['webmailUrl']
        );
    }

    /**
     * Gets the date that this email account was created.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
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
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return string
     */
    public function configurationProfile(): string
    {
        return $this->user['configurationProfile'];
    }
}
