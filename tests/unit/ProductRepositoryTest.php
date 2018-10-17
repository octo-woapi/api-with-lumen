<?php

use App\Repositories\ProductRepository;

class ProductRepositoryTest extends TestCase
{
  function testFindAllProducts()
  {
    $repository = new ProductRepository();
    $products = $repository->findAll();
    $this->assertGreaterThan(0, count($products));
  }

  function testGetProductById()
  {
    // Given a repository with products
    $repository = new ProductRepository();
    $productId = $repository->products[0]->id;
    // When calling getById with an existing product ID
    $product = $repository->getById($productId);
    // Then return a product
    $this->assertNotNull($product);
  }

  function testGetMissingProductById()
  {
    // Given a repository with products
    $repository = new ProductRepository();
    // When calling getById with a missing product ID
    $product = $repository->getById('nonexistingproductid');
    // Then the returned product should be null
    $this->assertNull($product);
  }

  function testCreateProduct()
  {
    // Given a repository
    $repository = new ProductRepository();
    // Number of products before insertion
    $before = count($repository->products);
    $input = [
      'name' => 'Honor 8x',
      'price' => 269.00,
      'weight' => 0.300
    ];
    // When calling create with an associative array input
    $product = $repository->create($input);
    // Then return a product
    $this->assertNotNull($product);
    $this->assertNotNull($product->id);
    // Number of products after insertion
    $after = count($repository->products);
    $this->assertEquals($before + 1, $after);
  }
}