@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id) {
            swal.fire({
                title: 'Confirma a exclusão?', text: 'Esta ação não poderá ser revertida',
                type: 'warning', showCancelButton:true, confirmButtonColor: '#3085D6',
                cancelButtonText: 'Cancelar!', closeOnConfirm: false,
            }).then(function (isConfirm) {
                if (isConfirm.value) {
                    $.get('/'+ @yield('table-delete')+'/'+id+'/destroy', function (data) {
                        if (data.staus == 200) {
                            swal.fire('Deletado', 'Registro deletado com sucesso', 'success').then(function () {
                                window.location.reload();
                            });
                        } else {
                            swal.fire('Atenção', 'Ocorreu algum problema durante a deleção, contato o admin', 'error')
                        }
                    });
                }
            });
        }
    </script>
@stop
