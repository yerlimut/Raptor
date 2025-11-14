<?php

namespace App\Http\Controllers;

use App\Models\Preorden;
use App\Models\OrdenTrabajo;
use App\Models\Mecanico;
use App\Models\Moto;
use App\Models\Repuesto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return view('preorden.index', compact('preorden', 'search', 'idOrden', 'idMecanico', 'idRepuesto', 'ordenes', 'mecanicos', 'repuestos', 'motos'));
    }



    public function create()
    {
        $ordenes = OrdenTrabajo::all();
        $motos = Moto::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();


        return view('Preorden.create', compact('ordenes', 'mecanicos', 'repuestos', 'motos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'idOrden' => 'required',
        'idMecanico' => 'required',
        'idRepuesto' => 'required|array|min:1',
        'idMoto' => 'required',
        'descripcion' => 'nullable|string',
        'mano_obra' => 'nullable|numeric|min:0',
        'saldo' => 'required|numeric|min:0',
    ]);

    $preorden = Preorden::create([
        'idOrden' => $request->idOrden,
        'idMecanico' => $request->idMecanico,
        'idMoto' => $request->idMoto,
        'descripcion' => $request->descripcion,
        'mano_obra' => $request->mano_obra,
        'saldo' => $request->saldo,
    ]);

    // Guardar los repuestos relacionados
    $preorden->repuestos()->attach($request->idRepuesto);

    return redirect()->route('Preorden.index')
        ->with('success', 'Preorden creada correctamente');
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

        return view('Preorden.edit', compact('preorden', 'ordenes', 'mecanicos', 'repuestos', 'motos'));
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

    public function porOrden($idOrden)
    {
        // ✅ Verificamos que exista la orden
        $orden = OrdenTrabajo::findOrFail($idOrden);

        // ✅ Obtenemos las preórdenes asociadas
        $query = Preorden::where('idOrden', $idOrden)
            ->with(['ordenTrabajo', 'mecanico', 'repuestos']);

        // ✅ Colecciones necesarias para filtros
        $ordenes = OrdenTrabajo::all();
        $mecanicos = Mecanico::all();
        $repuestos = Repuesto::all();
        $motos = Moto::all();

        // ✅ Paginamos igual que en index()
        $preorden = $query->paginate(10);



        $volver = route('ordenTrabajo.porDiagnostico', ['idDiagnostico' => $orden->idDiagnostico]);


        // ✅ Retornamos la misma vista que index()
        return view('Preorden.index', compact(
            'preorden',   // 👈 mismo nombre que usa tu index
            'ordenes',
            'mecanicos',
            'repuestos',
            'motos',
            'volver'
        ));
    }
    // 🧾 Mostrar PDF en el navegador
public function verPDF($id)
{
    $preorden = Preorden::with(['ordenTrabajo', 'mecanico', 'repuestos', 'moto'])->findOrFail($id);

    $pdf = Pdf::loadView('Preorden.pdf', compact('preorden'));
    return $pdf->stream('preorden_'.$preorden->id.'.pdf');
}

// 💾 Descargar PDF directamente
public function descargarPDF($id)
{
    $preorden = Preorden::with(['ordenTrabajo', 'mecanico', 'repuestos', 'moto'])->findOrFail($id);

    $pdf = Pdf::loadView('Preorden.pdf', compact('preorden'));
    return $pdf->download('preorden_'.$preorden->id.'.pdf');
}

}
