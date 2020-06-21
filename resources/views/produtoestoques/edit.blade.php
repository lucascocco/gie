@extends('adminlte::page')

@section('content')
    <h3>Novo Produto Estoque</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['produtoestoques.update', 'id'=>$produtoestoques->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('estoque_id', 'Estoque') !!}
        {!! Form::select('estoque_id',
                \App\Estoque::orderBy('nome')->pluck('nome', 'id')->toArray(),
                $produtoestoques->estoque_id, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('produto_id', 'Produto') !!}
        {!! Form::select('produto_id',
                \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(),
                $produtoestoques->produto_id, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantidade', 'Quantidade') !!}
        {!! Form::number('quantidade', $produtoestoques->quantidade, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantidade_min', 'Quantidade Mínima') !!}
        {!! Form::number('quantidade_min', $produtoestoques->quantidade_min, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor un.') !!}
        {!! Form::number('valor', $produtoestoques->valor, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Produto Estoque', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
