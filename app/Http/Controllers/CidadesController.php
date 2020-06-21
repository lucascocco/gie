<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;

class CidadesController extends Controller {
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $cidades = Cidade::orderBy('nome')->paginate(5);
        else
            $cidades = Cidade::where('nome', 'like', "%".$filtragem."%")->orderBy("nome")->paginate(5)->setpath('cidades?desc_filtro='.$filtragem);
        return view('cidades.index', ['cidades'=>$cidades]);
    }

    public function atualizaCidades() {
        $json = file_get_contents('http://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios');
        $obj = json_decode($json);
        $cidades = Cidade::all()->toArray();

        foreach ($obj as $key => $arr) {
            if(!in_array($arr->nome, $cidades)) {
                Cidade::create([
                    'nome'=>$arr->nome
                ]);
            }
        }
    }
}
