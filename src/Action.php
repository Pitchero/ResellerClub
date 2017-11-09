<?php

namespace ResellerClub;

class Action
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $statusDescription;

    /**
     * Create a new action instance.
     *
     * @param int $id
     * @param string $type
     * @param string $typeDescription
     * @param string $status
     * @param string $statusDescription
     */
    public function __construct(
        int $id,
        string $type,
        string $typeDescription,
        string $status,
        string $statusDescription
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->typeDescription = $typeDescription;
        $this->status = $status;
        $this->statusDescription = $statusDescription;
    }

    /**
     * Get the action ID.
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * Get the action type.
     *
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * Get the action type description.
     *
     * @return string
     */
    public function typeDescription(): string
    {
        return $this->typeDescription;
    }

    /**
     * Get the action status.
     *
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * Get the action status description.
     *
     * @return string
     */
    public function statusDescription(): string
    {
        return $this->statusDescription;
    }
}
