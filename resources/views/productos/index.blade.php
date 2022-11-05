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
                            <b>Listado de Productos</b>
                        </div>
                        <div class="mb-4">
                            <b>Listado de Productos</b>
                            <a href="{{ route('pro.create') }}" class="btn btn-primary float-right">Crear</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="nuestratabla">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Precio</th>
                                        <th>Peso</th>
                                        <th>Categorìa</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>State</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $pro)
                                    <tr>
                                        <td>{{ $pro->id }}</td>
                                        <td>{{ $pro->nombre }}</td>
                                        <td>{{ $pro->descripcion }}</td>
                                        <td>{{ $pro->precio }}</td>
                                        <td>{{ $pro->peso }}</td>
                                        <td>{{ $pro->categoria }}</td>
                                        <td>{{ $pro->cantidad }}</td>
                                        <td>{{ $pro->estado }}</td>
                                        <td>{{ $pro->fecha }}</td>
                                        <td>{{ $pro->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-sm btn-warning mr-2" href="{{ route('pro.edit', $pro->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form action="{{ route('pro.destroy', $pro->id) }}" class="eliminar" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
            title: 'Producto Eliminado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('crea'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Producto Creado Exitosamente',
            showConfirmButton: false,
            timer: 1500
            })
        @endif

        @if (session('update'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Producto Actualizado Exitosamente',
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
