<?php

namespace App\Http\Controllers;

use App\Models\Preorden;
use App\Models\OrdenTrabajo;
use App\Models\Mecanico;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class PreordenController extends Controller
{
    public function index()
    {
        $preordenes = Preorden::all();
        return view('Preorden.index', compact('preordenes'));
    }

    public function create()
    {
        $ordenes = OrdenTrabajo::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();
        return view('Preorden.create', compact('ordenes', 'mecanicos', 'repuestos'));
    }

    public function store(Request $request)
    {
{
    // Crear la preorden
    $preorden = Preorden::create([
        'idOrden' => $request->idOrden,
        'idMecanico' => $request->idMecanico,
        'descripcion' => $request->descripcion,
    ]);

    // Asociar los repuestos seleccionados (varios)
    $preorden->repuestos()->attach($request->idRepuesto);

    return redirect()->route('Preorden.index')
                    ->with('success', 'Preorden creada correctamente con varios repuestos.');
}

        return redirect()->route('Preorden.index');
    }

    public function show(Preorden $preorden)
    {
        //
    }

    public function edit($id)
    {
        $preordenes = Preorden::findOrFail($id);
        $ordenes = OrdenTrabajo::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();
        return view('Preorden.edit', compact('preordenes', 'ordenes', 'mecanicos', 'repuestos'));
    }

    public function update(Request $request, $id)
    {
        $preordenes = Preorden::findOrFail($id);
        $preordenes->update(
            $request->all()
        );
        return redirect()->route('Preorden.index');
    }

    public function destroy($id)
    {
        $preordenes = Preorden::findOrFail($id);

        try {
            $preordenes->delete();
            return redirect()->route('Preorden.index')
                ->with('success', 'Preorden eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('Preorden.index')
                ->with('error', 'No se puede eliminar esta preorden porque tiene registros asociados.');
        }
    }
}
