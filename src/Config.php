<?php

namespace ResellerClub;

class Config
{
    /**
     * @var integer
     */
    private $authUserId;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var bool
     */
    private $testMode;

    /**
     * Create a new config instance.
     *
     * @param int $authUserId
     * @param string $apiKey
     * @param bool $testMode
     */
    public function __construct(int $authUserId, string $apiKey, bool $testMode = false)
    {
        $this->authUserId = $authUserId;
        $this->apiKey = $apiKey;
        $this->testMode = $testMode;
    }

    /**
     * Get the auth user ID.
     *
     * @return int
     */
    public function authUserId(): int
    {
        return $this->authUserId;
    }

    /**
     * Get the API key.
     *
     * @return string
     */
    public function apiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Determine if test mode is enabled.
     *
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->testMode;
    }
}
