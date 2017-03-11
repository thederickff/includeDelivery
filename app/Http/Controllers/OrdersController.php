<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

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
    public function edit($id, UserRepository $userRepository){

        $list_status = [0=> 'Pendente', 1 => 'A caminho', 2=> 'Entrege'];
        $order = $this->repository->find($id);
        $deliveryman = $userRepository->getDeliveryMen();
        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }
    public function update(){


    }
}
