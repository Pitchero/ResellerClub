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

    public function __construct(int $auth_user_id, string $api_key, bool $test_mode = false)
    {
        $this->auth_user_id = $auth_user_id;
        $this->api_key = $api_key;
        $this->test_mode = $test_mode;
    }

    public function authUserId(): int
    {
        return $this->auth_user_id;
    }

    public function apiKey(): string
    {
        return $this->api_key;
    }

    public function isTestMode()
    {
        return $this->test_mode;
    }
}
