<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        OrderItem::truncate();
        factory(Order::class, 10)->create()->each(function($o){

            for($i = 0; $i <= 2; $i++){
                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id' => rand(1, 10),
                    'price' => 50,
                    'qtd' => rand(1, 2)
                ]));
            }
        });
    }
}
