<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class OrderService
{
    //
    //
    protected $order;
    protected $cupom;
    protected $product;

    public function __construct(OrderRepository $or, CupomRepository $cr, ProductRepository $pr)
    {
        $this->order = $or;
        $this->cupom = $cr;
        $this->product = $pr;
    }

    public function create(array $data)
    {

        \DB::beginTransaction();
        try {
            $data['status'] = 0;
            if (isset($data['cupom_code'])) {
                $cupom = $this->cupom->findByField('code', $data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
                $cupom->used = 1;
                $cupom->save();
                unset($data['cupom_code']);
            }

            $items = $data['items'];
            unset($data['items']);


            $order = $this->order->create($data);

            $total = 0;
            foreach ($items as $item) {
                $item['price'] = $this->product->find($item['product_id'])->price;

                $order->items()->create($item);
                $total += $item['price'] * $item['qtd'];
            }

            $order->total = $total;
            if(isset($cupom)){
                $order->total = $total - $cupom->value();
            }
            $order->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
