@extends('adminlte::page')

@section('content')
    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #03710B" class="pl-3"><b>Información Factura</b></h5>
                 </div>
                <div class="card-body">
                    <div class="container">
                        <div>
                            <form method="POST" id="formulario" action="{{ Route('venta.store') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        {{--  <h4 >V-PR-{{ str_pad($datos[0]->num_venta,3,"0",STR_PAD_LEFT) }}</h4>  --}}
                                        <h3 class="text-right mr-3 mt-3 mb-4">Código <span class="badge badge-info">V-PR-{{ str_pad($datos[0]->num_venta,3,"0",STR_PAD_LEFT) }}</span></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="font-weight-bold">Datos del cliente</h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Número de Identificación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="identificacion" id="identificacion" value="{{$datos[0]->identificacion }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Nombre Completo</label>
                                                                    <input type="text" class="form-control form-control-sm" name="cliente" id="cliente" value="{{$datos[0]->cliente }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="font-weight-bold">Venta</h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Vendedor</label>
                                                                    <input type="text" class="form-control form-control-sm" name="identificacion" id="identificacion" value="{{ $datos[0]->usuario }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                                                                    <input type="text" class="form-control form-control-sm" name="cliente" id="cliente" value="{{$datos[0]->fh_registro }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Producto(s)</th>
                                                <th>P. Unitario</th>
                                                <th>Cant.</th>
                                                <th class="text-right pr-3">SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rows_products">
                                        </tbody>
                                            @foreach ($detalle as $producto)
                                            <tr>
                                                <td>{{ $producto->nombre }}</td>
                                                <td>$ {{ number_format($producto->precio_venta,0,',','.') }}</th>
                                                <td>{{ $producto->cantidad }}</th>
                                                <td class="text-right pr-3">$ {{ number_format(($producto->precio_venta*$producto->cantidad),0,',','.') }}</td>
                                            </tr>
                                            @endforeach
                                        <tfoot>
                                            <tr>
                                                <th colspan="2"></th>
                                                <th>Total</th>
                                                <td class="text-right pr-3">$ {{ number_format($datos[0]->total,0,',','.') }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="exampleInputEmail1" class="form-label">Estado</label>
                                    <select class="form-control" name="estado">
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>
                                <br>
                                <br>
                                <a href="{{ route('venta.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atras</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop

@section('css')
<style>
    .form-sm {
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        height: calc(1.8125rem + 2px);
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem
    }

    .form-sm:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: inset 0 0 0 transparent
    }

</style>
@stop

@section('js')
@stop
