<?php

namespace Tests\Feature;

use App\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Test1 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/unittest');

        Produto::create(['nome'=>'Cano de metal 5m', 'descricao'=>'Cano de metal 5m']);
//        Produto::where('nome', 'Cano de metal 5m')->first();
        $arrProduto = Produto::pluck('nome');
        $this->assertTrue(in_array('Cano de metal 5m', $arrProduto));
        $this->assertFalse(in_array('Cano de metal 5m kkkk', $arrProduto));

        $response->assertStatus(200);
    }
}
