<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoEstoqueResquest;
use App\ProdutoEstoque;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdutoEstoquesController extends Controller
{
    public function index() {
        $produtoestoques = ProdutoEstoque::orderBy('created_at')->paginate(5);
        return view('produtoestoques.index', ['produtoestoques'=>$produtoestoques]);
    }

    public function create() {
        return view('produtoestoques.create');
    }

    public function store(ProdutoEstoqueResquest $request) {
        $novo_ProdutoEstoque = $request->all();
        ProdutoEstoque::create($novo_ProdutoEstoque);

        return redirect('produtoestoques');
    }

    public function destroy($id) {

        try {
            ProdutoEstoque::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'NULL');
        } catch (QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;
    }

    public function edit($id) {
        $produtoestoques = ProdutoEstoque::find($id);
        return view('produtoestoques.edit', compact('produtoestoques'));
    }

    public function update(ProdutoEstoqueResquest $request, $id) {
        ProdutoEstoque::find($id)->update($request->all());
        return redirect('produtoestoques');
    }
}
