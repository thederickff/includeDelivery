<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;

class OrdersController extends Controller
{
    //
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $orders = $this->repository->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
}
