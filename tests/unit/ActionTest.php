<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Action;

class ActionTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->action = new Action(
            $id = 461331388,
            $type = 'Add',
            $typeDescription = 'Addition of Business Email 1 for testdomainmail.com for 1 month',
            $status = 'PendingExecution',
            $statusDescription = 'The action is pending execution'
        );
    }

    public function testItCanGetId()
    {
        $this->assertEquals(461331388, $this->action->id());
    }

    public function testItCanGetType()
    {
        $this->assertEquals('Add', $this->action->type());
    }

    public function testItCanGetTypeDescription()
    {
        $this->assertEquals(
            'Addition of Business Email 1 for testdomainmail.com for 1 month',
            $this->action->typeDescription()
        );
    }

    public function testItCanGetStatus()
    {
        $this->assertEquals('PendingExecution', $this->action->status());
    }

    public function testItCanGetStatusDescription()
    {
        $this->assertEquals('The action is pending execution', $this->action->statusDescription());
    }
}
