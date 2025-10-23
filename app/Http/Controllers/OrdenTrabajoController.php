<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index(Request $request)
    {
        // 🔍 Obtener parámetros de filtro
        $search = $request->get('search');
        $estado = $request->get('estado');
        $idDiagnostico = $request->get('idDiagnostico');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $rangoInicio = $request->get('rangoInicio');
        $rangoFin = $request->get('rangoFin');

        // Construir consulta base
        $query = OrdenTrabajo::with('diagnostico');

        // 🔹 Filtro de búsqueda general (por ID o diagnóstico relacionado)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('diagnostico', function ($d) use ($search) {
                        $d->where('descripcion', 'LIKE', "%$search%");
                    });
            });
        }

        // 🔹 Filtro por estado
        if ($estado) {
            $query->where('estado', $estado);
        }

        // 🔹 Filtro por diagnóstico
        if ($idDiagnostico) {
            $query->where('idDiagnostico', $idDiagnostico);
        }

        // 🔹 Filtro por fecha de inicio exacta
        if ($fechaInicio) {
            $query->whereDate('fechaInicio', $fechaInicio);
        }

        // 🔹 Filtro por fecha de fin exacta
        if ($fechaFin) {
            $query->whereDate('fechaFin', $fechaFin);
        }

        // 🔹 Filtro por rango de fechas (entre dos fechas)
        if ($rangoInicio && $rangoFin) {
            $query->whereBetween('fechaInicio', [$rangoInicio, $rangoFin]);
        }

        // Ordenar por fecha de inicio (más reciente primero)
        $query->orderBy('fechaInicio', 'desc');

        // 📄 Paginación
        $ordenes = $query->paginate(15);
        $diagnosticos = Diagnostico::all();

        return view('OrdenTrabajo.index', compact('ordenes', 'diagnosticos', 'search', 'estado', 'idDiagnostico', 'fechaInicio', 'fechaFin', 'rangoInicio', 'rangoFin'));
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
        return redirect()->route('OrdenTrabajo.index');
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
        return redirect()->route('OrdenTrabajo.index');
    }

    public function destroy($id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);

        try {
            $ordenes->delete();
            return redirect()->route('OrdenTrabajo.index')
                ->with('success', 'Orden de trabajo eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('OrdenTrabajo.index')
                ->with('error', 'No se puede eliminar esta orden de trabajo porque tiene registros asociados.');
        }
    }
}
