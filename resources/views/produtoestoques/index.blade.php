@extends('layouts.default')

@section('content')
    <h1>Produto Estoque</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Estoque</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Quantidade Mínima</th>
        <th>Valor</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($produtoestoques as $produtoestoque)
            <tr>
                <td>{{ $produtoestoque->estoque->nome}}</td>
                <td>{{ $produtoestoque->produto->nome}}</td>
                <td>{{ $produtoestoque->quantidade}}</td>
                <td>{{ $produtoestoque->quantidade_min}}</td>
                <td>{{ $produtoestoque->valor}}</td>
                <td>
                    <a href="{{ route('produtoestoques.edit', ['id'=>$produtoestoque->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick=" return ConfirmaExclusao({{$produtoestoque->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$produtoestoques->links()}}

    <a href="{{ route('produtoestoques.create', []) }}" class="btn btn-info">Adicionar</a>

@stop

@section('table-delete')
    "produtoestoques"
@endsection

