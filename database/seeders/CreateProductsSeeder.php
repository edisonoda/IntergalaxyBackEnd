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
               'image_path' => 'https://goianita.vteximg.com.br/arquivos/ids/157651-800-800/Copo-Americano-190-ml---Nadir.jpg?v=637177179637300000',
            ],
            [
                'title'=>'Caneca',
                'price'=> 30.99,
                'description' => 'Caneca de porcelana 300 ml',
                'image_path' => 'https://socd.vteximg.com.br/arquivos/ids/172402-1310-1310/Caneca-Magica-para-Sublimacao.jpg?v=636523795113200000',
            ],
            [
                'title'=>'Prato',
                'price'=> 10.25,
                'description' => 'Prato raso de vidro',
                'image_path' => 'https://www.grillohomedecor.com.br/images/thumbs/0025169_prato-grande-em-vidro-atlasi-32cm-hauskraft_550.jpeg?width=382',
            ],
            [
                'title'=>'Garfo',
                'price'=> 3.50,
                'description' => 'Garfo de aço inox',
                'image_path' => 'https://a-static.mlcdn.com.br/618x463/garfo-de-sobremesa-aco-inox-bahia-univendas/limixdistribuidora/gsobrebaiha/3f53acd7823d00b4a7a7675ec6aabfcd.jpg',
            ],
            [
                'title'=>'Faca de Mesa',
                'price'=> 3.99,
                'description' => 'Faca com serra e cabo de plástico',
                'image_path' => 'https://d3pt1seq4txask.cloudfront.net/Custom/Content/Products/25/26/2526_faca-de-mesa-com-serra-sintonia-cabo-plastico-vermelho-109415_m3_637364543020761451.jpg',
            ],
            [
                'title'=>'Kit de Colheres de Plástico',
                'price'=> 2.99,
                'description' => 'Kit contendo 5 colheres de plástico descartáveis',
                'image_path' => 'https://i1.wp.com/masterdistribuidora.net.br/wp-content/uploads/2019/04/colher-sobremesa-descartavel-plastica-branca-2.jpg?fit=640%2C640&ssl=1',
            ],
            [
                'title'=>'Tigela',
                'price'=> 5.89,
                'description' => 'Tigela de plástico 600 ml',
                'image_path' => 'https://images.tcdn.com.br/img/img_prod/641157/tigela_sobremesa_pop_92_1_20180825154755.jpg',
            ],
        ];
  
        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
