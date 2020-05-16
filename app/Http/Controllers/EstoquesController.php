<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Estoque;
use App\Http\Requests\EstoqueRequest;

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

        try {
            Estoque::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>'NULL');
        } catch (QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        return $ret;
    }

    public function edit($id) {
        $estoques = Estoque::find($id);
        return view('estoques.edit', compact('estoques'));
    }

    public function update(EstoqueRequest $request, $id) {
        Estoque::find($id)->update($request->all());
        return redirect('estoques');
    }
}
