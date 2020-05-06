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

    {!! Form::open(['route'=>'estoques.store']) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Nome:') !!}
        {!! Form::text('endereco', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_cidade', 'Cidade') !!}
        {!! Form::select('id_cidade',
                array(
                    1=>'Tapejara'
                ),

                null, ['class'=>'form-control', 'required']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Criar Estoque', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
