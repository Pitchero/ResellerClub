<?php

namespace ResellerClub\Orders\Domains;

use Carbon\Carbon;

class RegistrantContactVerification
{
    /**
     * @var string
     */
    private $status;

    /**
     * @var string|null
     */
    private $verificationProcessStartTime;

    /**
     * RegistrantContactVerification constructor.
     *
     * @param string      $status
     * @param string|null $verificationProcessStartTime
     */
    public function __construct(string $status, string $verificationProcessStartTime = null)
    {
        $this->status = $status;
        $this->verificationProcessStartTime = $verificationProcessStartTime;
    }

    /**
     * Get the status of the registrant contact verification.
     *
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * Get the verification process start time, this is set to 'null' when the verification status is 'Verified'.
     *
     * @return null|Carbon
     */
    public function verificationProcessStartTime()
    {
        if (!$this->verificationProcessStartTime) {
            return;
        }

        return Carbon::createFromTimestamp($this->verificationProcessStartTime);
    }
}
