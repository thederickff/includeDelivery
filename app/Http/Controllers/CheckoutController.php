<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $clientId = $this->user->find(Auth::user()->id)->client->id;
        $orders = $this->order->scopeQuery(function ($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return view('costumer.order.index', compact('orders'));
    }

    public function create()
    {

        $products = $this->product->listStyle();

        return view('costumer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $clientId = $this->user->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->orderService->create($data);

        return redirect()->route('costumer.index');

    }
}
