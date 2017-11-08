<?php

namespace ResellerClub;

use GuzzleHttp\Psr7\Response;

abstract class Resource
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Create a new resource instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Create a resource instance from the given response.
     *
     * @param Response $response
     *
     * @return self
     */
    public static function fromResponse(Response $response)
    {
       return new static(json_decode($response->getBody(), true));
    }

    /**
     * Get the response status.
     *
     * @return string
     */
    public function status(): string
    {
        return $this->attributes['status'];
    }

    /**
     * Dynamically retrieve the value of an attribute.
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function __get($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return null;
    }
}
