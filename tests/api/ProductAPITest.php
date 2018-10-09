<?php

class ProductAPITest extends TestCase
{
  public function testFindAllProducts()
  {
    $this->get('/v1/products')
      ->seeStatusCode(200)
      ->seeJsonStructure([
        '*' => [
          'id',
          'name',
          'price',
          'weight'
        ]
      ]);
  }
}