@extends('adminlte::page')

@section('content')
    <h3>Novo Estoque</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'estoques.store']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço') !!}
        {!! Form::text('endereco', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cidade_id', 'Cidade') !!}
        {!! Form::select('cidade_id',
                \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                null, ['class'=>'form-control selectpicker', 'required', 'data-live-search'=>true]) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Criar Estoque', ['class'=>'btn btn-primary', 'id'=>'btnCreate']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop

@section('')
