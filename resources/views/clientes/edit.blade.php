@extends('adminlte::page')

@section('content')
    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #03710B" class="pl-3"><b>Actualizar cliente</b></h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div>
                            <form method="POST" action="{{url('clientes', $cliente->id)}}" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="id_type" class="form-label col-md-4 col-form-label text-md-end">Tipo de Identificación</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('id_type') is-invalid @enderror" name="id_type" id="id_type">
                                            <option value="" selected disabled>Seleccione</option>
                                            @foreach ($identificacion as $ide)
                                                <option value="{{ $ide->id }}" {{$cliente->tipos_identificacion_id == $ide->id ? 'selected' : ''}}>{{ $ide->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="id_number" class="form-label col-md-4 col-form-label text-md-end">Número de Identificación</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" id="id_number" min="6" maxlength="13" value="{{ old('id_number',$cliente->identificacion) }}">
                                        @error('id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="form-label col-md-4 col-form-label text-md-end">Nombre(s)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" maxlength="30" value="{{old('name',$cliente->nombre)}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name" class="form-label col-md-4 col-form-label text-md-end">Apellido(s)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" maxlength="30" value="{{old('last_name',$cliente->apellido)}}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="form-label col-md-4 col-form-label text-md-end">Teléfono</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" minlength="8" maxlength="10" value="{{old('phone',$cliente->telefono)}}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="form-label col-md-4 col-form-label text-md-end">Correo Electrónico</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" maxlength="100" value="{{old('email',$cliente->correo)}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="{{ route('cli.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
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
