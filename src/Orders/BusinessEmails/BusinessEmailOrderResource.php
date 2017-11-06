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

    public function domain()
    {
        return $this->parameters['description'];
    }

    public function orderId()
    {
        return $this->parameters['entityid'];
    }

    public function actionType()
    {
        return $this->parameters['actiontype'];
    }

    public function description()
    {
        return $this->parameters['actiontypedesc'];
    }

    public function actionId()
    {
        return $this->parameters['eaqid'];
    }

    public function actionStatus()
    {
        return $this->parameters['actionstatus'];
    }

    public function actionStatusDescription()
    {
        return $this->parameters['actionstatusdesc'];
    }

    public function invoiceId()
    {
        return $this->parameters['invoiceid'];
    }

    public function sellingCurrency()
    {
        return $this->parameters['sellingcurrencysymbol'];
    }

    public function sellingAmount()
    {
        return $this->parameters['sellingamount'];
    }

    public function transactionAmount()
    {
        return $this->parameters['unutilisedsellingamount'];
    }

    public function customerId()
    {
        return $this->parameters['customerid'];
    }
}
