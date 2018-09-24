<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
  /**
   * The product repository instance obtained from constructor injection.
   */
  protected $productRepository;

  /**
   * Create a new controller instance.
   */
  public function __construct(ProductRepository $productRepository)
  {
    $this->productRepository = $productRepository;
  }

  public function index()
  {
    $products = $this->productRepository->findAll();
    return response()->json(products);
  }
}
