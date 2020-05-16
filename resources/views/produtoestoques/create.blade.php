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

    {!! Form::open(['route'=>'produtoestoques.store']) !!}

    <div class="form-group">
        {!! Form::label('estoque_id', 'Estoque') !!}
        {!! Form::select('estoque_id',
                \App\Estoque::orderBy('nome')->pluck('nome', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('produto_id', 'Produto') !!}
        {!! Form::select('produto_id',
                \App\Produto::orderBy('nome')->pluck('nome', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantidade', 'Quantidade') !!}
        {!! Form::text('quantidade', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('quantidade_min', 'Quantidade Mínima') !!}
        {!! Form::text('quantidade_min', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor un.') !!}
        {!! Form::text('valor', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Produto Estoque', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
