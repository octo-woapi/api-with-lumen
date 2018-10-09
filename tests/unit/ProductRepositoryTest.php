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
}