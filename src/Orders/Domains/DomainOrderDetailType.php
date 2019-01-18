<?php

namespace ResellerClub\Orders\Domains;

class DomainOrderDetailType
{
    /**
     * @var string
     */
    private $detailOption;

    public static function all(): self
    {
        return new self('All');
    }

    public static function orderDetails(): self
    {
        return new self('OrderDetails');
    }

    public static function contactIds(): self
    {
        return new self('ContactIds');
    }

    public static function registrantContactDetails(): self
    {
        return new self('RegistrantContactDetails');
    }

    public static function adminContactDetails(): self
    {
        return new self('AdminContactDetails');
    }

    public static function technicalContactDetails(): self
    {
        return new self('TechContactDetails');
    }

    public static function billingContactDetails(): self
    {
        return new self('BillingContactDetails');
    }

    public static function namedServerDetails(): self
    {
        return new self('NsDetails');
    }

    public static function domainStatus(): self
    {
        return new self('DomainStatus');
    }

    public static function dnsSecurityDetails(): self
    {
        return new self('DNSSECDetails');
    }

    public static function orderStatus(): self
    {
        return new self('StatusDetails');
    }

    /**
     * Get the string representation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->detailOption;
    }

    /**
     * Create an instance of the order detail option class.
     *
     * @param string $detailOption
     *
     * @return self
     */
    private function __construct(string $detailOption)
    {
        $this->detailOption = $detailOption;
    }
}
