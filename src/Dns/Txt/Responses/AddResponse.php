<?php

namespace ResellerClub\Dns\Txt\Responses;

use ResellerClub\Message;
use ResellerClub\Response;

class AddResponse extends Response
{
    /**
     * Get the response message.
     *
     * @return Message
     */
    public function message(): Message
    {
        return new Message($this->attributes['msg']);
    }
}