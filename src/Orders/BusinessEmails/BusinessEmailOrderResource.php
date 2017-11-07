<?php

namespace ResellerClub\Orders\BusinessEmails;

use GuzzleHttp\Psr7\Response;

class BusinessEmailOrderResource
{
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public static function fromResponse(Response $parameters)
    {
        return new self(json_decode($parameters->getBody(), true));
    }

    public function domain(): string
    {
        return $this->parameters['description'];
    }

    public function orderId(): int
    {
        return $this->parameters['entityid'];
    }

    public function actionType(): string
    {
        return $this->parameters['actiontype'];
    }

    public function description(): string
    {
        return $this->parameters['actiontypedesc'];
    }

    public function actionId(): int
    {
        return $this->parameters['eaqid'];
    }

    public function actionStatus(): string
    {
        return $this->parameters['actionstatus'];
    }

    public function actionStatusDescription(): string
    {
        return $this->parameters['actionstatusdesc'];
    }

    public function invoiceId(): int
    {
        return $this->parameters['invoiceid'];
    }

    public function sellingCurrency(): string
    {
        return $this->parameters['sellingcurrencysymbol'];
    }

    public function sellingAmount(): string
    {
        return $this->parameters['sellingamount'];
    }

    public function transactionAmount(): string
    {
        return $this->parameters['unutilisedsellingamount'];
    }

    public function customerId(): int
    {
        return $this->parameters['customerid'];
    }
}
