<?php

namespace ResellerClub\Orders\Domains;

use Carbon\Carbon;

class PrivacyProtection
{
    /**
     * @var string
     */
    private $expiry;

    /**
     * @var string
     */
    private $registrantContact;

    /**
     * @var string
     */
    private $adminContact;

    /**
     * @var string
     */
    private $billingContact;

    /**
     * PrivacyProtection constructor.
     *
     * @param string $expiry
     * @param string $registrantContact
     * @param string $adminContact
     * @param string $billingContact
     */
    public function __construct(string $expiry, string $registrantContact, string $adminContact, string $billingContact)
    {
        $this->expiry = $expiry;
        $this->registrantContact = $registrantContact;
        $this->adminContact = $adminContact;
        $this->billingContact = $billingContact;
    }

    /**
     * When does the privacy protection expire.
     *
     * @return Carbon
     */
    public function expiry(): Carbon
    {
        return Carbon::createFromTimestamp($this->expiry);
    }

    /**
     * Gets the registrant contact information.
     *
     * @return string
     */
    public function registrantContact(): string
    {
        return $this->registrantContact;
    }

    /**
     * Gets the admin contact information.
     *
     * @return string
     */
    public function adminContact(): string
    {
        return $this->adminContact;
    }

    /**
     * Gets the billing contact information.
     *
     * @return string
     */
    public function billingContact(): string
    {
        return $this->billingContact;
    }
}
