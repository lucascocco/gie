@extends('layouts.default')

@section('content')
    <h1>Produto Estoque</h1>
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Estoque</th>
        <th>Tipo</th>
        <th>Produtos</th>
        </thead>

        <tbody>
        @foreach($movimentos as $movimento)
            <tr>
                <td>{{ $movimento->estoque->nome}}</td>
                <td>{{ $movimento->tipo == 'E' ? 'Entrada' : 'Saída'}}</td>
                <td>
                    @foreach($movimento->movimentoestoque as $a)
                        <li>{{ $a->produto->nome }} - Qtd: {{$a->quantidade}}</li>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{$movimentos->links()}}--}}

    <a href="{{ route('movimentos.create', []) }}" class="btn btn-info">Adicionar</a>

@stop

@section('table-delete')
    "movimentos"
@endsection

