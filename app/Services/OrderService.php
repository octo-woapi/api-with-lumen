<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
  protected $orderRepository;

  public function __construct(OrderRepository $orderRepository)
  {
    $this->orderRepository = $orderRepository;
  }

  public function createOrder(Order $order)
  {
    $id = $this->orderRepository->create($order);
    $order->id = $id;
  }
}