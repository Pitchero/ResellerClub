<?php

namespace ResellerClub\Orders\Domains\Requests;

use ResellerClub\Orders\Domains\DomainOrderDetailType;
use ResellerClub\Orders\Order;

class GetRequest
{
    /**
     * ID of the order which is to be returned.
     *
     * @var Order
     */
    protected $order;

    /**
     * Order detail level to be returned.
     *
     * @var DomainOrderDetailOption
     */
    private $domainOrderDetailOption;

    /**
     * Create a get request instance.
     *
     * @param Order                 $order
     * @param DomainOrderDetailType $domainOrderDetailOption
     */
    public function __construct(Order $order, DomainOrderDetailType $domainOrderDetailOption)
    {
        $this->order = $order;
        $this->domainOrderDetailOption = $domainOrderDetailOption;
    }

    /**
     * Get the ID of the order to be returned.
     *
     * @return int
     */
    public function orderId(): int
    {
        return $this->order->id();
    }

    /**
     * Get the order detail level to be returned.
     *
     * @return DomainOrderDetailType
     */
    public function orderDetailType(): DomainOrderDetailType
    {
        return $this->domainOrderDetailOption;
    }
}
