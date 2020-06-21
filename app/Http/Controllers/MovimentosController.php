<?php

namespace App\Http\Controllers;

use App\movimento;
use App\movimentoEstoque;
use App\ProdutoEstoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimentosController extends Controller {
    public function create() {
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
        $cont = count($produtos);

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

    public function destroy($id) {
        try {
            movimento::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'NULL');
        } catch (QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;
    }
}
