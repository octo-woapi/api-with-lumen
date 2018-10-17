<?php

use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;

class OrderServiceTest extends TestCase
{
  function testCreateOrderWithPriveAbove1000euros_thenOffer5PercentsDiscount()
  {
    $macbook = Product::productWithId('Macbook Pro 2015', 1020, 1.5);
    $order = new Order([
      [
        'product' => $macbook,
        'quantity' => 1
      ],
    ]);
    // Shipment: 25 euros
    $this->assertEquals(25, $order->shipmentAmount);
    // Default status: 'pending'
    $this->assertEquals('pending', $order->status);
    // Total weight
    $this->assertEquals(1.5, $order->totalWeight);
    // 1020 euros - 5% + 25 euros
    $this->assertEquals(969, $order->totalAmount);
  }
}