<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Identificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::select('clientes.id', 'tp.nombre as tipo_identificacion', DB::raw('CONCAT(clientes.nombre, " ", clientes.apellido) as cliente'), 'identificacion', 'telefono', 'correo')
            ->join('tipos_identificacion as tp', 'tp.id', 'clientes.tipos_identificacion_id')
            ->get();
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        $identificacion = Identificacion::all();
        return view('clientes.create', compact('identificacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_type' => 'required',
            'id_number' => ['required', 'int'],
            'name' => ['required', 'string', 'min:4', 'max:15'],
            'last_name' => ['required', 'string', 'min:4', 'max:15'],
            'phone' => ['required', 'string', 'min:7', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:125']
        ]);

        $cliente = new Cliente();
        $cliente->tipos_identificacion_id = $request['id_type'];
        $cliente->identificacion = $request['id_number'];
        $cliente->nombre = $request['name'];
        $cliente->apellido = $request['last_name'];
        $cliente->telefono = $request['phone'];
        $cliente->correo = $request['email'];
        $cliente->save();

        return redirect()->route('cli.index')->with('crea', 'ok');
    }


    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $identificacion = Identificacion::all();
        return view('clientes.edit', compact('cliente', 'identificacion'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_type' => 'required',
            'id_number' => ['required', 'int'],
            'name' => ['required', 'string', 'min:4', 'max:15'],
            'last_name' => ['required', 'string', 'min:4', 'max:15'],
            'phone' => ['required', 'string', 'min:7', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:125']
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->tipos_identificacion_id = $request['id_type'];
        $cliente->identificacion = $request['id_number'];
        $cliente->nombre = $request['name'];
        $cliente->apellido = $request['last_name'];
        $cliente->telefono = $request['phone'];
        $cliente->correo = $request['email'];
        $cliente->update();

        return redirect()->route('cli.index')->with('update', 'Cliente Actualizado');
    }


    public function buscarCliente(Request $request)
    {
        $cliente = Cliente::where('identificacion', $request['id'])->first();
        if (isset($cliente->id)) {
            return ($cliente);
        } else {
            return ("no existe");
        }
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'id_type' => 'required',
            'id_number' => ['required', 'int'],
            'name' => ['required', 'string', 'min:4', 'max:15'],
            'last_name' => ['required', 'string', 'min:4', 'max:15'],
            'phone' => ['required', 'string', 'min:7', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:125']
        ]);

        $cliente = new Cliente();
        $cliente->tipos_identificacion_id = $request['id_type'];
        $cliente->identificacion = $request['id_number'];
        $cliente->nombre = $request['name'];
        $cliente->apellido = $request['last_name'];
        $cliente->telefono = $request['phone'];
        $cliente->correo = $request['email'];
        $cliente->save();

        return $cliente;
    }
}
