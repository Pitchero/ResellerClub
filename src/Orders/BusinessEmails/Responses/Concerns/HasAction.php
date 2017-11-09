<?php

namespace ResellerClub\Orders\BusinessEmails\Responses\Concerns;

use ResellerClub\Action;

trait HasAction
{
    /**
     * Get the action returned from the API.
     *
     * @return Action
     */
    public function action(): Action
    {
        return new Action(
            $this->eaqid,
            $this->actiontype,
            $this->actiontypedesc,
            $this->actionstatus,
            $this->actionstatusdesc
        );
    }
}
