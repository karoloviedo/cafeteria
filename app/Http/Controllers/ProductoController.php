<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where('estado', '!=', 3)->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
       return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required','min:6','max:126'],
            'precio'=>['required','int','min:1'],
            'cantidad'=>['required','int','min:1'],
            'estado'=>['required','min:1','max:2']
        ]);

        $producto = new Producto();
        $producto->nombre = $request['nombre'];
        $producto->referencia = $request['referencia'];
        $producto->precio = $request['precio'];
        $producto->peso = $request['peso'];
        $producto->categoria = $request['categoria'];
        $producto->cantidad = $request['cantidad'];
        $producto->estado = $request['estado'];
        $producto->fecha = $request['fecha'];
        $producto->save();

        return redirect()->route('pro.index')->with('crea', 'ok');

    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {

        $pro = Producto::findOrFail($id);
        $pro->nombre = $request['nombre'];
        $pro->referencia = $request['referencia'];
        $pro->precio = $request['precio'];
        $pro->peso = $request['peso'];
        $pro->categoria = $request['categoria'];
        $pro->cantidad = $request['cantidad'];
        $pro->estado = $request['estado'] == "1" ? 1 : 0;
        $pro->fecha = $request['fecha'];
        $pro->update();
    

        return redirect()->route('pro.index')->with('update', 'Producto Actualizado');
    }

    public function destroy($id)
    {
        $pro = Producto::findOrFail($id);
        $pro->estado= 3;
        $pro->save();

        return redirect()->route('pro.index')->with('delete', 'ok');
    }


}
