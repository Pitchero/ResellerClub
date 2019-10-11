<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ResellerClub\Action;

class ActionTest extends TestCase
{
    /**
     * @var Action
     */
    private $action;

    protected function setUp(): void
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

    public function testItCanGetId(): void
    {
        $this->assertEquals(461331388, $this->action->id());
    }

    public function testItCanGetType(): void
    {
        $this->assertEquals('Add', $this->action->type());
    }

    public function testItCanGetTypeDescription(): void
    {
        $this->assertEquals(
            'Addition of Business Email 1 for testdomainmail.com for 1 month',
            $this->action->typeDescription()
        );
    }

    public function testItCanGetStatus(): void
    {
        $this->assertEquals('PendingExecution', $this->action->status());
    }

    public function testItCanGetStatusDescription(): void
    {
        $this->assertEquals('The action is pending execution', $this->action->statusDescription());
    }
}
