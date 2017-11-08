<?php

namespace ResellerClub;

use GuzzleHttp\Psr7\Response;
use ReflectionClass;

abstract class Resource
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * Create a new business email order resource instance.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Create a business email resource instance from the given response.
     *
     * @param Response $parameters
     *
     * @return self
     */
    public static function fromResponse(Response $parameters)
    {
        $called_class = (new ReflectionClass(get_called_class()));

        return $called_class->newInstance(json_decode($parameters->getBody(), true));
    }

    /**
     * Get the domain parameter.
     *
     * @return string
     */
    public function status(): string
    {
        return $this->parameters['status'];
    }
}
