@extends('adminlte::page')

@section('content')
    <h1>Usuários</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($estoques as $estoque)
            <tr>
                <td>{{ $estoque->nome}}</td>
                <td>{{ $estoque->endereco}}</td>
                <td>
                    <a href="{{ route('estoques.edit', ['id'=>$estoques->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="{{ route('estoques.destroy', ['id'=>$estoques->id]) }}" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('atores.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

