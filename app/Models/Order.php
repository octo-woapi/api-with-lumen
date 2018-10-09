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
  public $status;

  /**
   * The list of products belonging to this order.
   */
  public $products;

  /**
   * How much the shipment costs.
   */
  public $shipmentAmount;

  /**
   * How much the whole order costs.
   */
  public $totalAmount;

  /**
   * The cumulated weight of the products.
   */
  public $totalWeight;
}