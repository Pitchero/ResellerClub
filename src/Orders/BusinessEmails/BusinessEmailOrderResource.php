<?php

namespace ResellerClub\Orders\BusinessEmails;

use GuzzleHttp\Psr7\Response;

class BusinessEmailOrderResource
{
    /**
     * @var array
     */
    private $parameters;

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
        return new self(json_decode($parameters->getBody(), true));
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
     * Get the action type parameter.
     *
     * @return string
     */
    public function actionType(): string
    {
        return $this->parameters['actiontype'];
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
     * Get the invoice ID parameter.
     *
     * @return int
     */
    public function invoiceId(): int
    {
        return $this->parameters['invoiceid'];
    }

    /**
     * Get the selling currency parameter.
     *
     * @return string
     */
    public function sellingCurrency(): string
    {
        return $this->parameters['sellingcurrencysymbol'];
    }

    /**
     * Get the selling amount parameter.
     *
     * @return string
     */
    public function sellingAmount(): string
    {
        return $this->parameters['sellingamount'];
    }

    /**
     * Get the transaction amount parameter.
     *
     * @return string
     */
    public function transactionAmount(): string
    {
        return $this->parameters['unutilisedsellingamount'];
    }

    /**
     * Get the customer ID parameter.
     *
     * @return int
     */
    public function customerId(): int
    {
        return $this->parameters['customerid'];
    }
}
