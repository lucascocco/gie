<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produto::orderBy('nome')->paginate(5);
        return view('produtos.index', ['produtos'=>$produtos]);
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(ProdutoRequest $request) {
        $produtos = $request->all();
        Produto::create($produtos);

        return redirect('produtos');
    }

    public function destroy($id) {
        try {
            Produto::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'NULL');
        } catch (QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;
    }

    public function edit($id) {
        $produtos = Produto::find($id);
        return view('produtos.edit', compact('produtos'));
    }

    public function update(ProdutoRequest $request, $id) {
        Produto::find($id)->update($request->all());
        return redirect('produtos');
    }
}
