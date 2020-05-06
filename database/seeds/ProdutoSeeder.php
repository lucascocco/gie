<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Produto::create(['nome'=>'Cano de metal 5m', 'descricao'=>'Cano de metal 5m']);
        Produto::create(['nome'=>'Cano de PVC 5m', 'descricao'=>'Cano de PVC 5m']);
        Produto::create(['nome'=>'Cano de plástico 5m', 'descricao'=>'Cano de plástico 5m']);
    }
}
