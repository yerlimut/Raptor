<?php

namespace App\Http\Controllers;

use App\Models\Preorden;
use App\Models\OrdenTrabajo;
use App\Models\Mecanico;
use App\Models\Moto;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class PreordenController extends Controller
{
    public function index(Request $request)
    {
        // Obtener parámetros de filtro
        $search = $request->get('search');
        $idOrden = $request->get('idOrden');
        $idMecanico = $request->get('idMecanico');
        $idRepuesto = $request->get('idRepuesto');

        // Construir consulta
        $query = Preorden::with(['ordenTrabajo', 'mecanico', 'repuestos']);

        // Filtro de búsqueda general
        if ($search) {
            $query->where('descripcion', 'LIKE', "%{$search}%")
                ->orWhereHas('mecanico', function ($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('apellido', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('repuestos', function ($q) use ($search) {
                    $q->where('nombreRepuesto', 'LIKE', "%{$search}%");
                });
        }

        // Filtro por ID de orden
        if ($idOrden) {
            $query->where('idOrden', $idOrden);
        }

        // Filtro por ID de mecánico
        if ($idMecanico) {
            $query->where('idMecanico', $idMecanico);
        }

        // Filtro por ID de repuesto
        if ($idRepuesto) {
            $query->whereHas('repuestos', function ($q) use ($idRepuesto) {
                $q->where('repuestos.id', $idRepuesto);
            });
        }
        $ordenes = OrdenTrabajo::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();
        $motos = Moto::all();

        // Obtener resultados
        $preorden = $query->paginate(10);

        // Retornar vista con variables
        return view('preorden.index', compact('preorden', 'search', 'idOrden', 'idMecanico', 'idRepuesto', 'ordenes', 'mecanicos', 'repuestos','motos'));
    }



    public function create()
    {
        $ordenes = OrdenTrabajo::all();
        $motos = Moto::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();


        return view('Preorden.create', compact('ordenes', 'mecanicos', 'repuestos','motos'));
    }

    public function store(Request $request)
    { {
            // Crear la preorden
            $preorden = Preorden::create([
                'idOrden' => $request->idOrden,
                'idMecanico' => $request->idMecanico,
                'idMoto' => $request->idMoto,
                'descripcion' => $request->descripcion,
                'saldo' => $request->saldo,
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
        $preorden = Preorden::with('repuestos', 'mecanico', 'ordenTrabajo')->findOrFail($id);

        // Para los selects
        $ordenes = OrdenTrabajo::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();
        $motos = Moto::all();

        return view('Preorden.edit', compact('preorden', 'ordenes', 'mecanicos', 'repuestos','motos'));
    }


    public function update(Request $request, $id)
    {
        $preorden = Preorden::findOrFail($id);

        // Actualizar campos base
        $preorden->update([
            'idOrden' => $request->idOrden,
            'idMecanico' => $request->idMecanico,
            'descripcion' => $request->descripcion,
        ]);

        // Sincronizar los repuestos seleccionados (1 o varios)
        $preorden->repuestos()->sync($request->repuestos ?? []);

        // Recalcular saldo según precios
        $total = $preorden->repuestos()->sum('precio');
        $preorden->update(['saldo' => $total]);

        return redirect()->route('Preorden.index')->with('success', 'Preorden actualizada correctamente.');
    }

   public function destroy($id)
{
    $preorden = Preorden::findOrFail($id);
    $preorden->delete();

    return redirect()->route('Preorden.index')
        ->with('success', 'Preorden eliminada correctamente');
}

}
