<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Http;

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
    return response()->json($products, Http::OK);
  }

  public function show(string $id)
  {
    $product = $this->productRepository->getById($id);
    if ($product === null)
      throw new NotFoundException();
    return $this->response()->json($product, Http::OK);
  }

  public function replace(/* params */)
  {

  }

  public function remove(string $id)
  {
    
  }
}
