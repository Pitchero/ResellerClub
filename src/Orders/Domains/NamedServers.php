<?php

namespace ResellerClub\Orders\Domains;

class NamedServers
{
    /**
     * Number of named servers.
     *
     * @var int
     */
    private $numberOfNamedServers;

    /**
     * Named server 1.
     *
     * @var string
     */
    private $ns1;

    /**
     * Named server 2.
     *
     * @var string
     */
    private $ns2;

    /**
     * Child named server.
     *
     * @var string
     */
    private $cns;

    /**
     * NamedServers constructor.
     *
     * @param int    $numberOfNamedServers
     * @param string $ns1
     * @param string $ns2
     * @param string $cns
     */
    public function __construct(int $numberOfNamedServers = 0, string $ns1, string $ns2, string $cns)
    {
        $this->numberOfNamedServers = $numberOfNamedServers;
        $this->ns1 = $ns1;
        $this->ns2 = $ns2;
        $this->cns = $cns;
    }

    /**
     * Get the number of named servers.
     *
     * @return int
     */
    public function numberOfServers(): int
    {
        return $this->numberOfNamedServers;
    }

    /**
     * Get the primary named server.
     *
     * @return string
     */
    public function namedServer1(): string
    {
        return $this->ns1;
    }

    /**
     * Get the secondary named server.
     *
     * @return string
     */
    public function namedServer2(): string
    {
        return $this->ns2;
    }

    /**
     * Get the child named server.
     *
     * @return string
     */
    public function childNamedServer(): string
    {
        return $this->cns;
    }
}
