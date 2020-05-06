@extends('adminlte::page')

@section('content')
    <h1>Usuários</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome </th>
        <th>Login</th>
        <th>dataNascimento</th>
        <th>enderecoUsuario</th>
        <th>Ações</th>
        </thead>

        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nome}}</td>
                <td>{{ $usuario->Login}}</td>
                <td>{{ Carbon\Carbon::parse($usuario->dataNascimento)->format('d/m/Y') }}</td>
                <td>{{ $usuario->enderecoUsuario}}</td>

                <td>
                    <a href="{{ route('atores.edit', ['id'=>$usuario->id]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="{{ route('atores.destroy', ['id'=>$usuario->id]) }}" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('atores.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

