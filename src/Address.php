<?php

namespace ResellerClub;

class Address
{
    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $addressLine1;

    /**
     * @var string
     */
    private $addressLine2;

    /**
     * @var string
     */
    private $addressLine3;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $county;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $postCode;

    /**
     * Address constructor.
     * @param string $company
     * @param string $addressLine1
     * @param string $addressLine2
     * @param string $addressLine3
     * @param string $city
     * @param string $county
     * @param string $country
     * @param string $postCode
     */
    public function __construct(
        string $company,
        string $addressLine1,
        string $addressLine2,
        string $addressLine3,
        string $city,
        string $county,
        string $country,
        string $postCode
    ) {
        $this->company      = $company;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->addressLine3 = $addressLine3;
        $this->city         = $city;
        $this->county       = $county;
        $this->country      = $country;
        $this->postCode     = $postCode;
    }

    /**
     * Get the company's name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->format($this->company);
    }

    /**
     * Gets the first address line.
     *
     * @return string
     */
    public function addressLine1(): string
    {
        return $this->format($this->addressLine1);
    }

    /**
     * Gets the second address line.
     *
     * @return string
     */
    public function addressLine2(): string
    {
        return $this->format($this->addressLine2);
    }

    /**
     * Gets the third address line.
     *
     * @return string
     */
    public function addressLine3(): string
    {
        return $this->format($this->addressLine3);
    }

    /**
     * Gets the town/city address line.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->format($this->city);
    }

    /**
     * Gets the county/state address line.
     *
     * @return string
     */
    public function county(): string
    {
        return $this->format($this->county);
    }

    /**
     * Gets the country.
     *
     * @return string
     */
    public function country(): string
    {
        return $this->format($this->country);
    }

    /**
     * Gets the postcode/zip code address line.
     *
     * @return string
     */
    public function postCode(): string
    {
        return strtoupper($this->postCode);
    }

    /**
     * Transforms to the desired case format.
     *
     * @param string $string
     *
     * @return string
     */
    private function format(string $string)
    {
        return ucwords(strtolower($string));
    }
}
