<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class CreateOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
               'status'=> 'Em espera',
               'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Cancelado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Aprovado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Cancelado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
            [
                'status'=> 'Aprovado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id')[0],
            ],
        ];
  
        foreach ($order as $key => $value) {
            Order::create($value);
        }

        foreach(Order::all() as $order){
            $products = \App\Models\Product::inRandomOrder()->take(rand(1,5))->get();
            $totalPrice = 0;

            foreach ($products as $product){
                $productQuantity = rand(0,15);
                $totalPrice += $product->price * $productQuantity;
                $order->products()->attach($product->id, ['product_quantity' => $productQuantity]);
            }

            $order->total_price = $totalPrice;
            $order->save();
        }
    }
}
