<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrabajo::all();
        return view('OrdenTrabajo.index', compact('ordenes'));
    }

    public function create()
    {
        $diagnosticos = Diagnostico::all();
        return view('OrdenTrabajo.create', compact('diagnosticos'));
    }

    public function store(Request $request)
    {
        OrdenTrabajo::create(
            $request->all()
        );
        return redirect()->route('ordenTrabajo.index');
    }

    public function show(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    public function edit($id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);
        $diagnosticos = Diagnostico::all();
        return view('OrdenTrabajo.edit', compact('ordenes', 'diagnosticos'));
    }

    public function update(Request $request, $id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);
        $ordenes->update(
            $request->all()
        );
        return redirect()->route('ordenTrabajo.index');
    }

    public function destroy($id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);

        try {
            $ordenes->delete();
            return redirect()->route('ordenTrabajo.index')
                ->with('success', 'Orden de trabajo eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('ordenTrabajo.index')
                ->with('error', 'No se puede eliminar esta orden de trabajo porque tiene registros asociados.');
        }
    }
}
