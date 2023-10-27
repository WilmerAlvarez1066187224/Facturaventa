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
        $clientes = Cliente::all(); // No es necesario obtener todos los clientes si solo estás editando uno específico
        return view('cliente.editar', compact('cliente'));//La última línea del método return view('cliente.editar', compact('cliente')); pasa el objeto del cliente recuperado a la vista cliente.editar. Utiliza la función compact para pasar la variable $cliente a la vista.
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $clienteId)
    {
        $cliente = Cliente::find($clienteId); // Busca el cliente por su ID
    
        // Actualiza los campos del cliente con los datos del formulario
        $cliente->update([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            'direccion' => $request->input('direccion'),
            'cedula' => $request->input('cedula')
        ]);
    
        return redirect()->route('cliente.index')->with('message', 'Cliente actualizado exitosamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clienteId)
    {
        $cliente = Cliente::find($clienteId); // Encuentra el cliente por su ID y elimínalo directamente si existe
        $cliente->delete(); // Elimina el cliente
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado exitosamente');
    }
    
}
