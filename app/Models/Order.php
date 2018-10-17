<?php

namespace App\Models;

class Order {
  /**
   * The order id.
   */

  public $id;
  /**
   * The order status, either "pending", "paid" or "canceled".
   */
  public $status = 'pending';

  /**
   * The list of products belonging to this order.
   */
  public $products;

  /**
   * How much the shipment costs (in euros).
   */
  public $shipmentAmount = 25;

  /**
   * How much the whole order costs (in euros).
   */
  public $totalAmount;

  /**
   * The cumulated weight of the products.
   */
  public $totalWeight;

  public function __construct(array $products)
  {
    $this->products = $products;
  }
}