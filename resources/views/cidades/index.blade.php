@extends('layouts.default')

@section('content')
    <h1>Cidades</h1>

    {!! Form::Open(['name'=>'form_name', 'route'=>'cidades', 'method'=>'get']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquisar...">
            <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
        </div>
    </div>
    {!! Form::close() !!}
    <table class="table table-stripe table-bordered table-hover">
        <thead>
        <th>Nome</th>
        </thead>

        <tbody>
        @foreach($cidades as $cidade)
            <tr>
                <td>{{ $cidade->nome}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$cidades->links()}}

    <a id="btnAdd" onclick="AtualizaCidades()" class="btn btn-info">Buscar Cidades</a>

@stop

@section('js')
    <script>
        function AtualizaCidades(id) {
            swal.fire({
                title: 'Atenção', text: 'Deseja mesmo buscar as cidades?',
                type: 'warning', showCancelButton:true, confirmButtonColor: '#3085D6',
                cancelButtonText: 'Cancelar!', closeOnConfirm: false,
            }).then(function (isConfirm) {
                if (isConfirm.value) {
                    $.get('/cidades/atualizaCidades', function (data) {
                        console.log(data);
                    });
                }
            });
        }
    </script>
@stop
