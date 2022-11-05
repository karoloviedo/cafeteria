@extends('adminlte::page')

@section('title', 'Portal Dev\'s HKJ')

@section('content_header')

@stop

@section('content')

    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="mb-4">
                            <b>Listado de Clientes</b>
                            <a href="{{ route('cli.create') }}" class="btn btn-primary float-right">Crear</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="nuestratabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tipo de Identificación</th>
                                        <th>Número de Identificación</th>
                                        <th>Nombre Completo</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cli)
                                    <tr>
                                        <td>{{ $cli->id }}</td>
                                        <td>{{ $cli->tipo_identificacion }}</td>
                                        <td>{{ $cli->identificacion }}</td>
                                        <td>{{ $cli->cliente }}</td>
                                        <td>{{ $cli->telefono }}</td>
                                        <td>{{ $cli->correo }}</td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-sm btn-warning" href="{{ route('cli.edit', $cli->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        @if (session('delete'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cliente Eliminado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('crea'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cliente Creado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('update'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cliente Actualizado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif
        $(document).ready(function() {
            $('#nuestratabla').DataTable({
                language: {
                    processing: "Procesando...",
                    search: "Buscar en la Tabla:",
                    lengthMenu: "Filas a mostrar _MENU_ ",
                    info: "Mostrando _START_ de _END_ Elementos, Total _TOTAL_ Registros.",
                    infoEmpty: "No hay elementos en la tabla",
                    paginate: {
                        first: "Primero",
                        previous: "Atras",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                }
            });
        });
    </script>

@stop
