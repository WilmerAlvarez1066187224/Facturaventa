<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
{
    $clientes = Cliente::all(); // o cualquier lógica para obtener los clientes
    return view('cliente.index', compact('clientes'));
}

     
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('cliente.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        
        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Cliente agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit(Cliente $cliente)
{
      $clientes = Cliente::all();
      
    return view('cliente.editar', compact('cliente'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $cliente)
    {
      $cliente = Cliente::find($cliente);
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido = $request->input('apellido');
      $cliente->telefono = $request->input('telefono');
      $cliente->correo = $request->input('correo');
      $cliente->direccion = $request->input('direccion');
      $cliente->cedula = $request->input('cedula');

      $cliente->save();
      return redirect()->route('cliente.index')->with('message','votante Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
