<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Product
{
  public static function productWithId(string $name, int $price, float $weight): Product
  {
    try
    {
      $product = new Product($name, $price, $weight);
      $product->id = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'octo.com')->toString();
      return $product;
    }
    catch (UnsatisfiedDependencyException $ex)
    {
      echo 'Missing dependency: ' . $e->getMessage() . "\n";
      return null;
    }
  }

  /**
   * The product identifier
   */
  public $id;

  /**
   * Its name
   */
  public $name;

  /**
   * Its price
   */
  public $price;

  /**
   * Its weight in kg
   */
  public $weight;

  public function __construct(string $name, float $price, float $weight)
  {
    $this->name = $name;
    $this->price = $price;
    $this->weight = $weight;
  }
}