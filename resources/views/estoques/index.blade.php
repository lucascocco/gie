@extends('layouts.default')

@section('content')
    <h1>Estoques</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($estoques as $estoque)
            <tr>
                <td>{{ $estoque->nome}}</td>
                <td>{{ $estoque->endereco}}</td>
                <td>{{ $estoque->cidade->nome}}</td>
                <td>
                    <a href="{{ route('estoques.edit', ['id'=>$estoque->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick=" return ConfirmaExclusao({{$estoque->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$estoques->links()}}

    <a id="btnAdd" href="{{ route('estoques.create', []) }}" class="btn btn-info">Adicionar</a>

@stop

@section('table-delete')
    "estoques"
@endsection

