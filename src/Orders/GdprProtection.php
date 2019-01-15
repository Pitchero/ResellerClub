<?php

namespace ResellerClub\Orders;

class GdprProtection
{
    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var bool
     */
    private $eligibility;

    /**
     * GdprProtection constructor.
     *
     * @param bool $enabled
     * @param bool $eligibility
     */
    public function __construct(bool $enabled = false, bool $eligibility = false)
    {
        $this->enabled = $enabled;
        $this->eligibility = $eligibility;
    }

    /**
     * Is GDPR protection enabled?
     *
     * @return bool
     */
    public function enabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Is this order eligible GDPR protection?
     *
     * @return bool
     */
    public function eligible(): bool
    {
        return $this->eligibility;
    }
}
