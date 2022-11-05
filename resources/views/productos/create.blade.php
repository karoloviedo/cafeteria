@extends('adminlte::page')

@section('content')
    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #0071F9" class="pl-3"><b>Registrar producto</b></h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{Route('pro.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="nombre" class="form-label col-md-4 col-form-label text-md-end">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}">
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
                                    <input type="text" class="form-control" name="referencia" id="referencia" value="{{ old('referencia') }}">
                                    <small class="text-muted" role="alert">(Opcional)</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="precio" class="form-label col-md-4 col-form-label text-md-end">Precio</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio" value="{{ old('precio') }}">
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
                                    <input type="text" class="form-control @error('peso') is-invalid @enderror" name="peso" id="peso" value="{{ old('peso') }}">
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
                                    <input type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="categoria" value="{{ old('categoria') }}">
                                    @error('categoria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cantidad" class="form-label col-md-4 col-form-label text-md-end">Cantidad</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" id="cantidad" value="{{ old('cantidad') }}">
                                    @error('cantidad')
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
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
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
                                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{ old('fecha') }}">
                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ route('pro.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
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
