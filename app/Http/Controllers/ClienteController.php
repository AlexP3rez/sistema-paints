<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id_cliente', 'desc')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'nit' => 'nullable|string|max:15',
            'dpi' => 'nullable|string|max:15',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:clientes,email',
            'direccion' => 'nullable|string|max:200',
        ]);

        $validated['estado'] = true;
        $validated['acepta_promociones'] = $request->has('acepta_promociones');

        Cliente::create($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'nit' => 'nullable|string|max:15',
            'dpi' => 'nullable|string|max:15',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:clientes,email,' . $cliente->id_cliente . ',id_cliente',
            'direccion' => 'nullable|string|max:200',
        ]);

        $validated['acepta_promociones'] = $request->has('acepta_promociones');

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->update(['estado' => false]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente desactivado exitosamente.');
    }
}