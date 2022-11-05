<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\VentaDetalle;
use App\Models\Producto;
use App\Models\Identificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::select('ventas.id', 'ventas.estado','ventas.num_venta','ventas.created_at as fh_registro','c.identificacion',DB::raw('CONCAT(c.nombre, " ", c.apellido) as cliente'),DB::raw('CONCAT(u.name, " ") as usuario'),'ventas.total','t.nombre as tipo_doc')
                ->join('clientes as c', 'c.id','=', 'ventas.clientes_id')
                ->join('tipos_identificacion as t', 't.id','=', 'c.tipos_identificacion_id')
                ->join('users as u', 'u.id', '=', 'ventas.users_id')
                ->get();
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all()->where('estado',1);
        $identificacion = Identificacion::all();
        return view('venta.create', compact('productos','identificacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'identification_number'=>'required',
            'full_name'=>['required','string'],
            'payment_method'=>'required'
        ]);
        if (isset($request['producto_id']))
        {
            $maxFactura = DB::table('ventas')->max('num_venta');
            $ventas = New Venta();
            $ventas->clientes_id = $request['id_cliente'];
            $ventas->num_venta = $maxFactura+1;
            $ventas->total = 0;
            $ventas->estado = 1;
            $ventas->users_id = Auth::user()->id;
            $ventas->save();
            $total = 0;

            foreach($request['producto_id'] as $key => $pro){
                $valorProducto = Producto::select('precio')->findOrFail($pro);

                $detalle = new VentaDetalle();
                $detalle->ventas_id = $ventas->id;
                $detalle->productos_id = $pro;
                $detalle->precio_venta = $valorProducto->precio;
                $detalle->cantidad = $request['cantidad_id'][$key];
                $detalle->save();
                $total = $total + ($detalle->precio_venta * $detalle->cantidad);
                $descuento =  Producto::findOrFail($pro);
                $cant_anterior = $descuento->cantidad;
                $descuento->cantidad = $cant_anterior - $request['cantidad_id'][$key];
                $descuento->update();
            }
            $ventas->total = $total;
            $ventas->update();

        }
        else
        {
            return back()->with('error', 'ok');
        }


        return redirect()->route('venta.index')->with('crea', 'ok');
    }

    public function show($id)
    { 

        $datos = Venta::select('ventas.id','ventas.num_venta','ventas.created_at as fh_registro','c.identificacion as identificacion',DB::raw('CONCAT(c.nombre, " ", c.apellido) as cliente'),DB::raw('CONCAT(u.name, " ") as usuario'),'ventas.total','t.nombre as tipo_doc')
                ->join('clientes as c', 'c.id','=', 'ventas.clientes_id')
                ->join('tipos_identificacion as t', 't.id','=', 'c.tipos_identificacion_id')
                ->join('users as u', 'u.id', '=', 'ventas.users_id')
                ->where('ventas.id','=',$id)
                ->get();

        $detalle = DB::table('detalle_ventas as dv')
                ->join('productos as p', 'p.id', '=', 'dv.productos_id')
                ->select('p.nombre', 'dv.precio_venta', 'dv.cantidad')
                ->where('dv.ventas_id','=',$id)
                ->get();
        // dd($ventas);
        return view('venta.show', compact('datos','detalle'));
    }

    public function destroy($id)
    {
        $ventas = Venta::findOrFail($id);
        $ventas->estado = 3;
        $ventas->save();

        return redirect()->route('venta.index')->with('delete', 'ok');
    }

    public function payment($id)
    {
        $ventas = Venta::findOrFail($id);
        $ventas->estado = 3;
        $ventas->save();

        return redirect()->route('venta.index')->with('pagado', 'ok');
    }

    public function searchProduct(Request $request)
    {
        $producto = Producto::where('id', $request['id'])->first();
        if(isset($producto->id)){
            return ($producto);
        }else {
            return ("no existe");
        }
    }

}

?>