<?php

namespace ResellerClub\Orders\BusinessEmails\Resources;

use GuzzleHttp\Psr7\Response;
use ReflectionClass;
use ResellerClub\Resource;

class BusinessEmailOrderResource extends Resource
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
    public function domain(): string
    {
        return $this->parameters['description'];
    }

    /**
     * Get the order ID parameter.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->parameters['entityid'];
    }

    /**
     * Get the action ID parameter.
     *
     * @return int
     */
    public function actionId(): int
    {
        return $this->parameters['eaqid'];
    }

    /**
     * Get the action type parameter.
     *
     * @return string
     */
    public function actionType(): string
    {
        return $this->parameters['actiontype'];
    }

    /**
     * Get the action status parameter.
     *
     * @return string
     */
    public function actionStatus(): string
    {
        return $this->parameters['actionstatus'];
    }

    /**
     * Get the action status description parameter.
     *
     * @return string
     */
    public function actionStatusDescription(): string
    {
        return $this->parameters['actionstatusdesc'];
    }

    /**
     * Get the description parameter.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->parameters['actiontypedesc'];
    }
}
