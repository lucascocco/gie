<?php

namespace Tests\Feature;

use App\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

//        Produto::create(['nome'=>'Cano de metal 5m', 'descricao'=>'Cano de metal 5m']);
        DB::table('produtos')->insert(
            ['nome' => 'Cano de metal 5m', 'descricao'=>'Cano de metal 5m']
        );
//        Produto::where('nome', 'Cano de metal 5m')->first();
        $arrProduto = DB::table('produtos')->pluck('nome')->toArray();

        $this->assertTrue(in_array('Cano de metal 5m', $arrProduto));
        $this->assertFalse(in_array('Cano de metal 5m kkkk', $arrProduto));

        $response->assertStatus(200);
    }
}
