<?php

namespace ResellerClub;

class Config
{
    /**
     * @var integer
     */
    private $auth_user_id;

    /**
     * @var string
     */
    private $api_key;

    /**
     * @var bool
     */
    private $test_mode;

    /**
     * Create a new config instance.
     *
     * @param int $auth_user_id
     * @param string $api_key
     * @param bool $test_mode
     */
    public function __construct(int $auth_user_id, string $api_key, bool $test_mode = false)
    {
        $this->auth_user_id = $auth_user_id;
        $this->api_key = $api_key;
        $this->test_mode = $test_mode;
    }

    /**
     * Get the auth user ID.
     *
     * @return int
     */
    public function authUserId(): int
    {
        return $this->auth_user_id;
    }

    /**
     * Get the API key.
     *
     * @return string
     */
    public function apiKey(): string
    {
        return $this->api_key;
    }

    /**
     * Determine if test mode is enabled.
     *
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->test_mode;
    }
}
