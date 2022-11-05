@extends('adminlte::page')

@section('content')
    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #03710B" class="pl-3"><b>Actualizar producto</b></h5>
                 </div>
                <div class="card-body">
                    <div class="container">
                        <div>
                            <form method="POST" action="{{url('productos', $producto->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="nombre" class="form-label col-md-4 col-form-label text-md-end">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre',$producto->nombre) }}">
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="referencia" class="form-label col-md-4 col-form-label text-md-end">Referencia</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="referencia" id="referencia" value="{{old('referencia',$producto->referencia)}}">
                                        <small class="text-muted" role="alert">(Opcional)</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="precio" class="form-label col-md-4 col-form-label text-md-end">Precio</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold pl-3"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio" value="{{old('precio',$producto->precio)}}">
                                        </div>
                                        @error('precio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="peso" class="form-label col-md-4 col-form-label text-md-end">Peso</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold pl-3"><i class="fas fa-dollar-sign"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('peso') is-invalid @enderror" name="peso" id="peso" value="{{old('peso',$producto->peso)}}">
                                        </div>
                                        @error('peso')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="categoria" class="form-label col-md-4 col-form-label text-md-end">Categoría</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="categoria" id="categoria" value="{{old('categoria',$producto->categoria)}}">
                                        <small class="text-muted" role="alert">(Opcional)</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="cant" class="form-label col-md-4 col-form-label text-md-end">Cantidad</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold" style="font-family: 100px!important"><i class="fas fa-plus"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('cant') is-invalid @enderror" name="cant" id="cant" value="{{old('cant',$producto->cantidad)}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text font-weight-bold" style="font-family: 100px!important"><i class="fas fa-minus"></i></span>
                                            </div>
                                        </div>
                                        @error('cant')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="estado" class="form-label col-md-4 col-form-label text-md-end">Estado</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado">
                                            <option value="0" selected disabled>Seleccione</option>
                                            <option value="1" {{$producto->estado == 1 ? 'selected' : ''}} >Activo</option>
                                        <option value="2" {{$producto->estado == 2 ? 'selected' : ''}}>Inactivo</option>
                                        </select>
                                        @error('estado')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fecha" class="form-label col-md-4 col-form-label text-md-end">Fecha</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{old('fecha',$producto->fecha)}}">
                                        <small class="text-muted" role="alert">(Opcional)</small>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('pro.index') }}" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
    </div>
@stop

@section('css')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    input[type=number] { -moz-appearance:textfield; }
</style>
@stop

@section('js')

@stop
