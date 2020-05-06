<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Http\Requests\EstoqueResquest;

class EstoquesController extends Controller
{
    public function index() {
        $estoques = Estoque::orderBy('nome')->paginate(5);
        return view('estoques.index', ['estoques'=>$estoques]);
    }

    public function create() {
        return view('estoques.create');
    }

    public function store(EstoqueRequest $request) {
        $novo_Estoque = $request->all();
        Estoque::create($novo_Estoque);

        return redirect('estoques');
    }

    public function destroy($id) {
        Estoque::find($id)->delete();
        return redirect('estoques');
    }

    public function edit($id) {
        $ator = Estoque::find($id);
        return view('estoques.edit', compact('ator'));
    }

    public function update(EstoqueRequest $request, $id) {
        Estoque::find($id)->update($request->all());
        return redirect('estoques');
    }
}
