<?php

namespace ResellerClub\Orders\Domains;

class DomainOrderDetailType
{
    /**
     * @var string
     */
    private $detailOption;

    public static function all(): DomainOrderDetailType
    {
        return new self('All');
    }

    public static function orderDetails(): DomainOrderDetailType
    {
        return new self('OrderDetails');
    }

    public static function contactIds(): DomainOrderDetailType
    {
        return new self('ContactIds');
    }

    public static function registrantContactDetails(): DomainOrderDetailType
    {
        return new self('RegistrantContactDetails');
    }

    public static function adminContactDetails(): DomainOrderDetailType
    {
        return new self('AdminContactDetails');
    }

    public static function technicalContactDetails(): DomainOrderDetailType
    {
        return new self('TechContactDetails');
    }

    public static function billingContactDetails(): DomainOrderDetailType
    {
        return new self('BillingContactDetails');
    }

    public static function namedServerDetails(): DomainOrderDetailType
    {
        return new self('NsDetails');
    }

    public static function domainStatus(): DomainOrderDetailType
    {
        return new self('DomainStatus');
    }

    public static function dnsSecurityDetails(): DomainOrderDetailType
    {
        return new self('DNSSECDetails');
    }

    public static function orderStatus(): DomainOrderDetailType
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
