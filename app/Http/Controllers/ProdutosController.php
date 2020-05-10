<?php

namespace App\Http\Controllers;

use App\Produto;
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
        Produto::find($id)->delete();
        return redirect('produtos');
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
