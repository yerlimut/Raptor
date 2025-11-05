<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticoRequest;
use App\Models\Diagnostico;
use App\Models\Moto;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index(Request $request)
    {
        // 🔍 Parámetros de filtro
        $search = $request->get('search');
        $estado = $request->get('estado');
        $tipo = $request->get('tipo');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $sort = $request->get('sort', 'fechaDiagnostico');
        $direction = $request->get('direction', 'desc');

        // 🔹 Construcción de consulta
        $query = \App\Models\Diagnostico::with('moto');

        // 🔍 Filtro de búsqueda general (por descripción o nombre de moto si existe relación)
        if ($search) {
            $query->where('descripcion', 'LIKE', "%{$search}%")
                ->orWhereHas('moto', function ($q) use ($search) {
                    $q->where('modelo', 'LIKE', "%{$search}%");
                });
        }

        // 🟢 Filtro por estado
        if ($estado) {
            $query->where('estado', $estado);
        }

        // 🔵 Filtro por tipo
        if ($tipo) {
            $query->where('tipo', $tipo);
        }

        // 📅 Filtro por rango de fechas
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('fechaDiagnostico', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            $query->whereDate('fechaDiagnostico', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            $query->whereDate('fechaDiagnostico', '<=', $fechaFin);
        }

        // 🔢 Ordenar resultados
        $query->orderBy($sort, $direction);

        // 📄 Paginación
        $diagnosticos = $query->paginate(10)->appends($request->query());

        // 📤 Retornar vista
        return view('diagnostico.index', compact('diagnosticos'));
    }


    public function create()
    {
        $motos = Moto::all();
        return view('Diagnostico.create', compact('motos'));
    }

    public function store(DiagnosticoRequest $request)
    {
        Diagnostico::create(
            $request->all()
        );
        return redirect()->route('diagnostico.index');
    }

    public function show(Diagnostico $diagnostico)
    {
        //
    }

    public function edit($id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);
        $motos = Moto::all();
        return view('Diagnostico.edit', compact('diagnosticos', 'motos'));
    }

    public function update(DiagnosticoRequest $request, $id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);
        $diagnosticos->update(
            $request->all()
        );
        return redirect()->route('diagnostico.index');
    }

    public function destroy($id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);

        try {
            $diagnosticos->delete();
            return redirect()->route('diagnostico.index')
                ->with('success', 'Diagnóstico eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('diagnostico.index')
                ->with('error', 'No se puede eliminar este diagnóstico porque tiene registros asociados.');
        }
    }

    public function porMoto($idMoto)
{
    $moto = Moto::findOrFail($idMoto);
    $diagnosticos = Diagnostico::where('idMoto', $idMoto)->with('moto')->get();

    return view('diagnostico.index', compact('diagnosticos', 'moto'));
}

}
