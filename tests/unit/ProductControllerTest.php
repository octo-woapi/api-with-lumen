<?php

use App\Http\Controllers\ProductController;
use App\Repositories\ProductRepository;

class ProductControllerTest extends TestCase
{
    public function testCreateProductController()
    {
      $repository = new ProductRepository();
      $productController = new ProductController($repository);
      $this->assertNotNull($productController);
    }
}