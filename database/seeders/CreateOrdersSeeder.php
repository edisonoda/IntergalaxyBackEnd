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
               'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Cancelado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Aprovado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Cancelado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Em espera',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
            [
                'status'=> 'Aprovado',
                'user_id'=> \App\Models\User::inRandomOrder()->take(1)->pluck('id'),
            ],
        ];
  
        foreach ($order as $key => $value) {
            Product::create($value);
        }

        foreach(Order::all() as $order){
            $products = \App\Models\Product::inRandomOrder()->take(rand(1,5))->pluck('id');
            $order->products()->attach($product);
        }
    }
}
