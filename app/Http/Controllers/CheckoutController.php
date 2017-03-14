<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    //
    protected $order;
    protected $user;
    protected $product;

    public function __construct(OrderRepository $or, UserRepository $ur, ProductRepository $pr)
    {
        $this->order = $or;
        $this->user = $ur;
        $this->product = $pr;
    }

    public function create(){

        $products = $this->product->listStyle();

        return view('costumer.order.create', compact('products'));
    }
}
