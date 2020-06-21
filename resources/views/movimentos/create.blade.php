@extends('adminlte::page')

@section('content')
    <h3>Novo Movimento</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'movimentos.store']) !!}

    <div class="form-group">
        {!! Form::label('estoque_id', 'Estoque') !!}
        {!! Form::select('estoque_id',
                \App\Estoque::orderBy('nome')->pluck('nome', 'id')->toArray(),
                null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo', 'Tipo de Movimento') !!}
        {!! Form::select('tipo',
                ['S'=>'Saída', 'E'=>'Entrada'],
                null, ['class'=>'form-control', 'required']) !!}
    </div>

    <h4>Produtos</h4>
    <div class="input_fields_wrap"></div>
        <br>
        <button style="float:right" class="add_field_button btn btn-default">Adicionar Produto</button>
        <br>
    <hr />

    <div class="form-group">
        {!! Form::submit('Criar Movimento', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function(){
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x=0;
            $(add_button).click(function(e){
                x++;
                estoque_id = $('#estoque_id').val();
                var newField = '<div><div style="width:94%; float:left; display: inline-flex" id="produto">{!! Form::select("produtos[]", \App\Produto::join('produto_estoques', 'produto_id', '=', 'produtos.id')->where('estoque_id', 1)->orderBy("nome")->pluck("nome","produto_id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Produto"]) !!}{!! Form::number('quantidade[]', null, ['class'=>'form-control', 'required', 'style'=>'width: 30%; text-align: right']) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>

@stop
