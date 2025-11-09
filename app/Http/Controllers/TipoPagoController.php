<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    public function index()
    {
        $tiposPago = TipoPago::orderBy('id_tipo_pago', 'desc')->paginate(10);
        return view('tipos-pago.index', compact('tiposPago'));
    }

    public function create()
    {
        return view('tipos-pago.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:tipos_pago,nombre',
            'descripcion' => 'nullable|string|max:100',
        ]);

        $validated['estado'] = true;

        TipoPago::create($validated);

        return redirect()->route('tipos-pago.index')
            ->with('success', 'Tipo de pago creado exitosamente.');
    }

    public function show(TipoPago $tiposPago)
    {
        return view('tipos-pago.show', ['tipoPago' => $tiposPago]);
    }

    public function edit(TipoPago $tiposPago)
    {
        return view('tipos-pago.edit', ['tipoPago' => $tiposPago]);
    }

    public function update(Request $request, TipoPago $tiposPago)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:tipos_pago,nombre,' . $tiposPago->id_tipo_pago . ',id_tipo_pago',
            'descripcion' => 'nullable|string|max:100',
        ]);

        $tiposPago->update($validated);

        return redirect()->route('tipos-pago.index')
            ->with('success', 'Tipo de pago actualizado exitosamente.');
    }

    public function destroy(TipoPago $tiposPago)
    {
        $tiposPago->update(['estado' => false]);

        return redirect()->route('tipos-pago.index')
            ->with('success', 'Tipo de pago desactivado exitosamente.');
    }
}