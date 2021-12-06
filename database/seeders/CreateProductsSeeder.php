<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class CreateProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
               'title'=>'Copo',
               'price'=> 20.50,
               'description' => 'Copo americano comum de vidro',
               'image_path' => 'https://i.imgur.com/uGm6lp8.jpg',
            ],
            [
                'title'=>'Caneca',
                'price'=> 30.99,
                'description' => 'Caneca de porcelana 300 ml',
                'image_path' => 'https://i.imgur.com/uCWbf0m.jpg',
            ],
            [
                'title'=>'Prato',
                'price'=> 10.25,
                'description' => 'Prato raso de vidro',
                'image_path' => 'https://i.imgur.com/Uz8EunS.jpg',
            ],
            [
                'title'=>'Garfo',
                'price'=> 3.50,
                'description' => 'Garfo de aço inox',
                'image_path' => 'https://i.imgur.com/66P4ML0.jpg',
            ],
            [
                'title'=>'Faca de Mesa',
                'price'=> 3.99,
                'description' => 'Faca com serra e cabo de plástico',
                'image_path' => 'https://i.imgur.com/r73sq3e.jpg',
            ],
            [
                'title'=>'Kit de Colheres de Plástico',
                'price'=> 2.99,
                'description' => 'Kit contendo 5 colheres de plástico descartáveis',
                'image_path' => 'https://i.imgur.com/fPdaJ2a.jpg',
            ],
            [
                'title'=>'Tigela',
                'price'=> 5.89,
                'description' => 'Tigela de plástico 600 ml',
                'image_path' => 'https://i.imgur.com/CHzKmVg.jpg',
            ],
        ];
  
        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
