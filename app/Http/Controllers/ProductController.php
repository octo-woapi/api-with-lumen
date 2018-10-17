<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return response()->json(null, Http::NotFound);
    return response()->json($product, Http::OK);
  }

  public function create(Request $request)
  {
    // Retrieve all parameters
    $input = $request->all();
    $product = $this->productRepository->create($input);
    $url = $request->url();
    $headers = [
      'Location' => "$url/$product->id"
    ];
    return response()->json(null, Http::Created, $headers);
  }

  public function replace(/* params */)
  {

  }

  public function remove(string $id)
  {
    
  }
}
