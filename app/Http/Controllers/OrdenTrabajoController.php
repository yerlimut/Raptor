<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Diagnostico;
use App\Models\Moto;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index(Request $request)
    {
        // 🔍 Filtros
        $search = $request->get('search');
        $estado = $request->get('estado');
        $idDiagnostico = $request->get('idDiagnostico');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $rangoInicio = $request->get('rangoInicio');
        $rangoFin = $request->get('rangoFin');

        // Consulta base con relaciones
        $query = OrdenTrabajo::with(['diagnostico', 'moto']);

        // Filtros
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhereHas('diagnostico', function ($d) use ($search) {
                        $d->where('descripcion', 'LIKE', "%$search%");
                    })
                    ->orWhereHas('moto', function ($m) use ($search) {
                        $m->where('placa', 'LIKE', "%$search%");
                    });
            });
        }

        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($idDiagnostico) {
            $query->where('idDiagnostico', $idDiagnostico);
        }

        if ($fechaInicio) {
            $query->whereDate('fechaInicio', $fechaInicio);
        }

        if ($fechaFin) {
            $query->whereDate('fechaFin', $fechaFin);
        }

        if ($rangoInicio && $rangoFin) {
            $query->whereBetween('fechaInicio', [$rangoInicio, $rangoFin]);
        }

        // Ordenar
        $query->orderBy('fechaInicio', 'desc');

        // Datos para vista
        $ordenes = $query->paginate(15);
        $diagnosticos = Diagnostico::all();
        $motos = Moto::with('marca')->get();

        

        return view('OrdenTrabajo.index', compact(
            'ordenes',
            'diagnosticos',
            'motos',
            'search',
            'estado',
            'idDiagnostico',
            'fechaInicio',
            'fechaFin',
            'rangoInicio',
            'rangoFin'
            
        ));
    }

    public function create()
    {
        $diagnosticos = Diagnostico::all();
        $motos = Moto::with('marca')->get();
        return view('OrdenTrabajo.create', compact('diagnosticos', 'motos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
            'estado' => 'required|string',
            'idDiagnostico' => 'required|exists:diagnosticos,id',
            'idMoto' => 'required|exists:motos,id',
        ]);

        OrdenTrabajo::create([
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'estado' => $request->estado,
            'idDiagnostico' => $request->idDiagnostico,
            'idMoto' => $request->idMoto,
        ]);

        return redirect()->route('OrdenTrabajo.index')
            ->with('success', 'Orden de trabajo creada correctamente.');
    }

    public function edit($id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);
        $diagnosticos = Diagnostico::all();
        $motos = Moto::with('marca')->get();

        return view('OrdenTrabajo.edit', compact('ordenes', 'diagnosticos', 'motos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
            'estado' => 'required|string',
            'idDiagnostico' => 'required|exists:diagnosticos,id',
            'idMoto' => 'required|exists:motos,id',
        ]);

        $ordenes = OrdenTrabajo::findOrFail($id);
        $ordenes->update($request->all());

        return redirect()->route('OrdenTrabajo.index')
            ->with('success', 'Orden de trabajo actualizada correctamente.');
    }

    public function destroy($id)
    {
        $ordenes = OrdenTrabajo::findOrFail($id);

        try {
            $ordenes->delete();
            return redirect()->route('OrdenTrabajo.index')
                ->with('success', 'Orden de trabajo eliminada correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('OrdenTrabajo.index')
                ->with('error', 'No se puede eliminar esta orden de trabajo porque tiene registros asociados.');
        }
    }

    // ✅ Método corregido sin errores
    public function porDiagnostico($idDiagnostico)
    {
        // Se obtiene el diagnóstico con su moto asociada
        $diagnostico = Diagnostico::with('moto')->findOrFail($idDiagnostico);

        // Se cargan las órdenes asociadas
        $ordenes = OrdenTrabajo::where('idDiagnostico', $idDiagnostico)
            ->with(['diagnostico', 'moto'])
            ->orderBy('fechaInicio', 'desc')
            ->paginate(15);

        // Listas auxiliares
        $diagnosticos = Diagnostico::all();
        $motos = Moto::with('marca')->get();

        // Variables vacías para la vista
        $search = $estado = $fechaInicio = $fechaFin = $rangoInicio = $rangoFin = null;

        // ✅ Ruta de retorno segura
        $volver = $diagnostico->moto
            ? route('diagnostico.porMoto', ['idMoto' => $diagnostico->moto->id])
            : route('OrdenTrabajo.index');

        return view('OrdenTrabajo.index', compact(
            'ordenes',
            'diagnosticos',
            'motos',
            'search',
            'estado',
            'idDiagnostico',
            'fechaInicio',
            'fechaFin',
            'rangoInicio',
            'rangoFin',
            'volver'
        ));
    }
}
