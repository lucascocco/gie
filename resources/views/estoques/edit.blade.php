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

    {!! Form::open(['route'=>['estoques.update', 'id'=>$estoques->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $estoques->nome, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Nome:') !!}
        {!! Form::text('endereco', $estoques->endereco, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cidade_id', 'Cidade') !!}
        {!! Form::select('cidade_id',
                \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                $estoques->cidade_id, ['class'=>'form-control', 'required']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Editar Estoque', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
