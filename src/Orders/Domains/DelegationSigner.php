<?php

namespace ResellerClub\Orders\Domains;

class DelegationSigner
{
    /**
     * @var string
     */
    private $keyTag;

    /**
     * @var string
     */
    private $algorithm;

    /**
     * @var string
     */
    private $digest;

    /**
     * @var string
     */
    private $digestType;

    /**
     * DelegationSigner constructor.
     *
     * @param string $keyTag
     * @param string $algorithm
     * @param string $digest
     * @param string $digestType
     */
    public function __construct(string $keyTag, string $algorithm, string $digest, string $digestType)
    {
        $this->keyTag = $keyTag;
        $this->algorithm = $algorithm;
        $this->digest = $digest;
        $this->digestType = $digestType;
    }

    /**
     * Get the key tag, a short numeric value which can help quickly identify the referenced DNSKEY-record.
     *
     * @return string
     */
    public function keyTag(): string
    {
        return $this->keyTag;
    }

    /**
     * Gets the algorithm of the referenced DNSKEY-record.
     *
     * @return string
     */
    public function algorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * Gets a cryptographic hash value of the referenced DNSKEY-record.
     *
     * @return string
     */
    public function digest(): string
    {
        return $this->digest;
    }

    /**
     * Gets the cryptographic hash algorithm used to create the Digest value.
     *
     * @return string
     */
    public function digestType(): string
    {
        return $this->digestType;
    }
}
