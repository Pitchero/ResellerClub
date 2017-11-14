<?php

namespace ResellerClub\Orders\EmailAccounts\Settings;

class PopSettings
{
    /**
     * @var string
     */
    protected $popSettings;

    /**
     * Create a new email account settings instance.
     *
     * @param string $popSettings
     */
    public function __construct(string $popSettings)
    {
        $this->popSettings = $popSettings;
    }

    /**
     * Get the POP settings address.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->popSettings;
    }


}
