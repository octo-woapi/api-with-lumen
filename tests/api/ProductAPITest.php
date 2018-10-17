<?php

use App\Models\Product;

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

  public function testGetOneProduct()
  {
    $id = $this->get('/v1/products')->response->original[0]->id;
    $this->get("/v1/products/$id")
      ->seeStatusCode(200)
      ->seeJsonStructure([
        'id',
        'name',
        'price',
        'weight'
      ]);
  }

  public function testGetNonExistingProduct()
  {
    $this->get('/v1/products/nonexisting')->seeStatusCode(404);
  }

  public function testCreateProduct()
  {
    $product = [
      'name' => 'Honor 8x',
      'price' => 269.00,
      'weight' => 0.300
    ];
    $this->post('/v1/products', $product)
      ->seeStatusCode(201);
  }
}