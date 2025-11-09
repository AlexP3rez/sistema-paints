<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::orderBy('id_sucursal', 'desc')->paginate(10);
        return view('sucursales.index', compact('sucursales'));
    }

    public function create()
    {
        return view('sucursales.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:200',
            'departamento' => 'required|string|max:50',
            'telefono' => 'nullable|string|max:15',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
        ]);

        $validated['estado'] = true;

        Sucursal::create($validated);

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal creada exitosamente.');
    }

    public function show(Sucursal $sucursale)
    {
        return view('sucursales.show', ['sucursal' => $sucursale]);
    }

    public function edit(Sucursal $sucursale)
    {
        return view('sucursales.edit', ['sucursal' => $sucursale]);
    }

    public function update(Request $request, Sucursal $sucursale)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:200',
            'departamento' => 'required|string|max:50',
            'telefono' => 'nullable|string|max:15',
            'latitud' => 'nullable|numeric|between:-90,90',
            'longitud' => 'nullable|numeric|between:-180,180',
        ]);

        $sucursale->update($validated);

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal actualizada exitosamente.');
    }

    public function destroy(Sucursal $sucursale)
    {
        $sucursale->update(['estado' => false]);

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal desactivada exitosamente.');
    }
}