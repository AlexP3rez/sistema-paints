<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('id_marca', 'desc')->paginate(10);
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:marcas,nombre',
            'descripcion' => 'nullable|string|max:200',
            'pais_origen' => 'nullable|string|max:50'
        ]);

        $validated['estado'] = true;

        Marca::create($validated);

        return redirect()->route('marcas.index')
            ->with('success', 'Marca creada exitosamente.');
    }

    public function show(Marca $marca)
    {
        return view('marcas.show', compact('marca'));
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:marcas,nombre,' . $marca->id_marca . ',id_marca',
            'descripcion' => 'nullable|string|max:200',
            'pais_origen' => 'nullable|string|max:50'
        ]);

        $marca->update($validated);

        return redirect()->route('marcas.index')
            ->with('success', 'Marca actualizada exitosamente.');
    }

    public function destroy(Marca $marca)
    {
        $marca->update(['estado' => false]);

        return redirect()->route('marcas.index')
            ->with('success', 'Marca desactivada exitosamente.');
    }
}