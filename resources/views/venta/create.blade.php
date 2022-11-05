@extends('adminlte::page')

@section('content')
    <div class="container py-3">
        <main>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #0071F9" class="pl-3"><b> Creación de Factura</b></h5>
                 </div>
                <div class="card-body">
                    <div class="container">
                        <div>
                            <form method="POST" id="formulario" class="FormGeneral" action="{{ Route('venta.store') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="font-weight-bold">Datos del cliente
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="identificacion" class="form-label">Número de Identificación:</label>
                                                            <input type="text" class="form-control form-control-sm @error('identification_number') is-invalid @enderror" name="identification_number" id="identificacion" onkeypress="return valueNumber(event);" minlength="6" maxlength="12">
                                                            @error('identification_number')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="cliente" class="form-label">Nombre Completo:</label>
                                                            <input type="text" class="form-control form-control-sm @error('full_name') is-invalid @enderror" name="full_name" id="cliente" readonly>
                                                            @error('full_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="display:none">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">ID Cliente:</label>
                                                            <input type="hidden" class="form-sm" name="id_cliente" id="id_cliente" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row mb-4">
                                        <div class="col-md-9">
                                            <h5 class="pb-2 font-weight-bold">Vendedor</h5>
                                            {{ strtoupper(auth()->user()->name) }} {{ strtoupper(auth()->user()->apellido) }}
                                        </div>
                                        <div class="col-md-3">
                                            <label for="payment_method" class="pb-2 font-weight-bold">Método de pago</label>
                                            <select class="form-control form-control-sm  @error('payment_method') is-invalid @enderror" name="payment_method" id="payment_method">
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="1">Efectivo</option>
                                                <option value="2">Tarjeta de Crédito</option>
                                                <option value="3">Tarjeta de Débito</option>
                                                <option value="4">Crédito</option>
                                                <option value="5">Pago total</option>
                                            </select>
                                            @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Producto(s)</th>
                                                <th>Disponible</th>
                                                <th>Cant.</th>
                                                <th>Precio</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control form-control-sm" name="producto"
                                                        id="product">
                                                        <option value='' disabled selected>Seleccione</option>
                                                        @foreach ($productos as $ide)
                                                            <option value="{{ $ide->id }}">{{ $ide->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><span id="available">0</span></td>
                                                <td><input type="text" class="form-sm" size="5" id="quantity"
                                                        onkeypress="return valueNumber(event);" minlength="1" maxlength="5">
                                                </td>
                                                <td>$ <span id="price">0</span></td>
                                                <td>$ <span id="row_total">0</span></td>
                                                <td width="100px">
                                                    <button type="button" disabled class="btn btn-link btn-sm text-success" id="add_product">+
                                                        Agregar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="15px"></th>
                                                <th>Producto(s)</th>
                                                <th>P. Unitario</th>
                                                <th>Cant.</th>
                                                <th class="text-right pr-3">SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rows_products">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3"></th>
                                                <th>Total</th>
                                                <td class="text-right pr-3" id="totalFactura">$ 0</td>
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
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <a href="{{ route('venta.index') }}" class="btn btn-danger">Cancelar</a>
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
    <script type="text/javascript">

        $('#quantity').keyup(function(){
            let cantidad = parseFloat($(this).val());
            let available = parseFloat($('#available').text());
            let resultado = available - cantidad;
            if(cantidad > available){
                Swal.fire('No puedes agregar esta cantidad');
                $('#add_product').prop('disabled', true);
            } else {
                $('#add_product').prop('disabled', false);
            }
        });

        function valueNumber(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // backspace.
                return true;
            } else if (code >= 48 && code <= 57) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }

        function valueLetters(evt) {
            // // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 32 || code == 241 || code == 209) { // backspace.
                return true;
            } else if ((code >= 65 && code <= 90) || (code >= 97 && code <= 122)) { // is a letter.
                return true;
            } else { // other keys.
                return false;
            }
        }
        $(document).ready(function() {

            $('.FormGeneral').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "Que desea crear la factura",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, generar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.submit();
                    }
                })
            });

            $('#register_client').click(function(){
                let form = $(this).parents('form');
                let url = "{{ route('store.cliente') }}";
                let parametters = form.serialize();
                $.get(url, parametters, function(result){
                    $('#cliente').val(result['nombre']);
                    $('#identificacion').val(result['identificacion']);
                    $('#id_cliente').val(result['id']);
                    $('#clientModal').modal('hide')
                }).fail(function(result){
                    {{--  alert("no "+result);  --}}
                });
            });

            $('#identificacion').blur(function() {
                let id = $(this).val();
                if(id != "")
                {
                    $.ajax({
                        url: "{{ route('api.cliente') }}",
                        type: 'GET',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            if (res == "no existe") {
                                $('#cliente').val('')
                                $('#id_cliente').val('')
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Parece que el cliente no existe!',
                                    footer: 'Por favor verificar el Número de Identificación'
                                })
                            } else {
                            $('#cliente').val(res['nombre']+" "+res['apellido'])
                            $('#id_cliente').val(res['id'])
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
                else
                {
                    $('#cliente').val("")
                    $('#id_cliente').val("")
                }
            });
            // Selecciona el producto
            $('#product').change(function() {
                let product = $('#product').val();
                // alert(product);
                $.ajax({
                    url: "{{ route('api.productos') }}",
                    type: 'GET',
                    data: {
                        id: product
                    },
                    success: function(res) {
                        if (res == "no existe") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Parece que el producto no existe!',
                                footer: 'Por favor verificar el catálogo de productos'
                            })
                        } else {
                            $('#price').text(res['precio']);
                            $('#available').text(res['cantidad']);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            // Escribe la cantidad del producto para calcular el total
            $('#quantity').keyup(function() {
                var precio = $('#price').text();
                $('#row_total').text($(this).val() * precio);
            });
            var indice = 1;
            var totalGeneral = 0;
            // Añade el producto al detalle
            $('#add_product').click(function() {
                //×
                let product = $('#product option:selected').text();
                let cantidad = $('#quantity').val();
                let precio = $('#price').text();
                let id = $('#product').val();
                let subtot = precio * cantidad;
                let available = parseFloat($('#available').text());
                let agregadas = 0
                $('#rows_products').find("tr").each(function(i, v) {
                    //    let input = $(this).find("td:eq(1)").find('input').val();
                    let input = parseFloat( $(this).find('td:eq(1)').find('input[name="producto_id['+parseFloat(1+i)+']"]').val());
                    //    console.log("id"+input);
                    if(input == id){
                        let cantidad = parseFloat( $(this).find('td:eq(3)').html());
                        // console.log("cant"+cant);
                        agregadas = agregadas + cantidad;
                        console.log("total:"+agregadas);
                    }
                });
                if(cantidad <= (available-agregadas))
                {
                    if (product != "Seleccione" && !cantidad.trim() == "" && cantidad > 0)
                    {
                        $("#rows_products").append(
                        "<tr><td><button type='button' class='btn btn-link btn-sm delete-row text-danger font-weight-bold'>X</button></td><td>" +
                        product + "<input type='hidden' value='"+id +"' name='producto_id["+indice +"]' ><input type='hidden' value='"+cantidad +"' name='cantidad_id["+indice +"]' ></td><td>" + precio + "</td><td>" + cantidad +
                        "</td><td class='text-right pr-3'>$ " + subtot + "</td></tr>");
                    }
                    indice = indice + 1;
                    totalGeneral += cantidad * precio;
                    $('#totalFactura').text('$ '+totalGeneral);

                }
                else {
                    Swal.fire('No hay stock suficiente para esta cantidad');
                }
                $('#product').val("");
                $('#available').text("0");
                $('#quantity').val("");
                $('#price').text("0");
                $('#row_total').text("0");
            });
            // Eliminar la fila del detalle
            $(document).on('click', '.delete-row', function(event) {
                event.preventDefault();
                $(this).closest('tr').remove();
                let valor = $(this).closest('tr').find('td:eq(4)').html().slice(2);
                totalGeneral -= valor;
                $('#totalFactura').text('$ '+totalGeneral);
            });
        });
    </script>
@stop
