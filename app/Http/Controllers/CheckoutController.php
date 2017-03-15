<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    //
    protected $order;
    protected $orderService;
    protected $user;
    protected $product;

    public function __construct(OrderRepository $or, UserRepository $ur, ProductRepository $pr, OrderService $os)
    {
        $this->order = $or;
        $this->user = $ur;
        $this->product = $pr;
        $this->orderService = $os;
    }

    public function create(){

        $products = $this->product->listStyle();

        return view('costumer.order.create', compact('products'));
    }
    public function store(Request $request){
        $this->orderService->create($request->all());
    }
}
