<?php

namespace App\Http\Controllers;

use App\movimento;
use App\movimentoEstoque;
use App\ProdutoEstoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimentosController extends Controller {
    public function create() {
        $_SESSION['estoque_id'] = '';
        return view('movimentos.create');
    }

    public function store(Request $request){
        $movimento = movimento::create([
            'tipo' => $request->get('tipo'),
            'estoque_id' => $request->get('estoque_id'),
            'users_id' => Auth::id()
        ]);

        $produtos = $request->produtos;
        $quantidades = $request->quantidade;
        $cont = count((array)$produtos);

        for ($i = 0; $i < $cont; $i++) {
            movimentoEstoque::create([
                'movimento_id' => $movimento->id,
                'produto_id' => $produtos[$i],
                'quantidade'=> $quantidades[$i]
            ]);

            $qtd = $quantidades[$i] * ($request->get('tipo') == 'S' ? -1 : 1);

            ProdutoEstoque::where('produto_id', $produtos[$i])->where('estoque_id', $request->get('estoque_id'))->increment('quantidade', $qtd);
        }

        return redirect()->route('movimentos');
    }

    public function index() {
        $movimentos = movimento::all();
        return view('movimentos.index', ['movimentos'=>$movimentos]);
    }

//    public function montaCampoProduto() {
//        $str = Form::select("produtos[]", \App\Produto::join('produto_estoques', 'produto_id', '=', 'produtos.id')->where('estoque_id',  1)->orderBy("nome")->pluck("nome","produto_id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Produto"]);
//        $str .= Form::number('quantidade[]', null, ['class'=>'form-control', 'required', 'style'=>'width: 30%; text-align: right']);
//        return $str;
//    }

    public function setVariable($id){
        $_SESSION['estoque_id'] = $id;
    }
}
