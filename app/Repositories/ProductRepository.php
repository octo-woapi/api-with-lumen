<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements Repository
{
  public $products;

  function __construct()
  {
    $this->products = [
      Product::productWithId('Macbook Pro 2015', 1200, 1.5),
      Product::productWithId('Asus ZenBook', 1400, 2)
    ];
  }

  function findAll()
  {
    return $this->products;
  }

  function getById(string $id)
  {
    return array_first($this->products, function($product) use ($id) {
      return $product->id === $id;
    });
  }
}