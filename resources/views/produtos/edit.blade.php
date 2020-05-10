@extends('adminlte::page')

@section('content')
    <h3>Nova Nacionaliade</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>['produtos.update', 'id'=>$produtos->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', $produtos->nome, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição') !!}
        {!! Form::text('descricao', $produtos->descricao, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
