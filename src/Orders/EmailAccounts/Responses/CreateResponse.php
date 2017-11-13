<?php

namespace ResellerClub\Orders\EmailAccounts\Responses;

use Carbon\Carbon;
use ResellerClub\EmailAccountSettings;
use ResellerClub\Response;

class CreateResponse extends Response
{
    /**
     * Gets the newly created email address.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return string
     */
    public function emailAddress(): string
    {
        return $this->response['user']['emailAddress'];
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
        return $this->response['user']['domainName'];
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
        return $this->response['user']['firstName'];
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
        return $this->response['user']['lastName'];
    }

    /**
     * Gets the user's email address to notify regarding this email account.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return string
     */
    public function notificationsEmail(): string
    {
        return $this->response['user']['alternateEmailAddress'];
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
        return $this->response['user']['internalForwards'];
    }

    /**
     * Gets the email account's quota limit.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return int
     */
    public function quotaLimt(): int
    {
        return $this->response['user']['quotaLimit'];
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
        return $this->response['user']['status'];
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
        return $this->response['user']['accountType'];
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
        return $this->response['user']['quotaUsed'];
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
        return $this->response['user']['countryCode'];
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
        return $this->response['user']['percentageQuotaUsage'];
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
        return $this->response['user']['languageCode'];
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
            $this->response['user']['accountSettings']['popSettings'],
            $this->response['user']['accountSettings']['imapSettings'],
            $this->response['user']['accountSettings']['smtpSettings'],
            $this->response['user']['accountSettings']['webmailUrl']
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
        return new Carbon($this->response['user']['createdOn']);
    }

    /**
     * Is pop email access enabled.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return bool
     */
    public function isPopAccessEnabled(): bool
    {
        return $this->response['user']['popAccessEnabled'];
    }

    /**
     * Is imap email access enabled.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return bool
     */
    public function isImapAccessEnabled(): bool
    {
        return $this->response['user']['imapAccessEnabled'];
    }

    /**
     * Is webmail email access enabled.
     *
     * @see https://manage.resellerclub.com/kb/answer/1037
     *
     * @return bool
     */
    public function isWebmaiAccessEnabled(): bool
    {
        return $this->response['user']['webmailAccessEnabled'];
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
        return $this->response['user']['canFooterOptout'];
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
        return $this->response['user']['revertBlacklistRequestExists'];
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
        return $this->response['user']['configurationProfile'];
    }
}
