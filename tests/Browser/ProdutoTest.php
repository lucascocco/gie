<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProdutoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/produtos')
                ->waitForText('Produtos')
                ->assertPathIs('/produtos')
                ->click('a[id="btnAdd"]')
                ->type('nome', 'Produto Teste')
                ->type('descricao', 'Descrição Produto 1')
                ->press('Criar Produto');

        });

        $arrProduto = DB::table('produtos')->pluck('nome')->toArray();
        $this->assertTrue(in_array('Produto Teste', $arrProduto));

        DB::table('produtos')->where('nome', '=', 'Produto Teste')->delete();

        $arrProduto = DB::table('produtos')->pluck('nome')->toArray();

        $this->assertFalse(in_array('Produto Teste', $arrProduto));

    }
}
