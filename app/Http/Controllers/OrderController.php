<?php

namespace App\Http\Controllers;

use App\Http\Http;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
  protected $orderRepository;

  public function __construct($orderRepository)
  {
    $this->orderRepository = $orderRepository;
  }

  public function index()
  {
    $orders = $this->orderRepository->findAll();
    return response()->json($orders, Http::OK);
  }

  public function create(Request $request)
  {
    $order = new Order($request->products);
  }
}