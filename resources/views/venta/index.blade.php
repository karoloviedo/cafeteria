@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="mb-4">
                            <b>Listado de Ventas</b>
                            <a href="{{ route('venta.create') }}" class="btn btn-primary float-right">Crear</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="nuestratabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha y Hora</th>
                                        <th>Código</th>
                                        <th>Número de Identificación</th>
                                        <th>Nombre Completo</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            <td>{{ $venta->fh_registro }}</td>
                                            <td>V-PR-{{ str_pad($venta->num_venta, 3, '0', STR_PAD_LEFT) }}</td>
                                            <td data-toggle="tooltip" data-placement="top" title="{{ $venta->tipo_doc }}"
                                                style="cursor:pointer">{{ $venta->identificacion }}</td>
                                            <td>{{ strtoupper($venta->cliente) }}</td>
                                            <td>$ {{ number_format($venta->total, 0, ',', '.') }}</td>
                                            <td>{{ $venta->estado == 1 ? 'Pagado' : 'Anulada' }}</td>
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-sm btn-warning mr-2"
                                                        href="{{ route('venta.show', $venta->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Ver">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    @if ($venta->estado != 3)
                                                        <form action="{{ route('venta.destroy', $venta->id) }}"
                                                            method="post" class="eliminar">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" type="submit"
                                                                data-toggle="tooltip" data-placement="top" title="Cancelar">
                                                                <i class="far fa-times-circle"></i>
                                                            </button>
                                                        </form>
                                                    @endif

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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        @if (session('delete'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'La venta fue anulada del sistema',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('pagado'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'La venta fue pagada correctamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

         @if (session('error'))
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'La factura no contenia articulos',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('crea'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Factura Creada Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('update'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Factura Actualizado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        $(document).ready(function() {
            $('.eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                title: 'Estas tu seguro?',
                text: "Una vez borrado, no podras recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar esto!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })

            });

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
