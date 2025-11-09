<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('id_proveedor', 'desc')->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:200',
        ]);

        $validated['estado'] = true;

        Proveedor::create($validated);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    public function show(Proveedor $proveedore)
{
    return view('proveedores.show', compact('proveedore'));
}

    public function edit(Proveedor $proveedore)
    {
        return view('proveedores.edit', ['proveedor' => $proveedore]);
    }

    public function update(Request $request, Proveedor $proveedore)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'contacto' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:200',
        ]);

        $proveedore->update($validated);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedore)
    {
        $proveedore->update(['estado' => false]);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor desactivado exitosamente.');
    }
}