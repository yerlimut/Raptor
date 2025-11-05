<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Moto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 📥 Parámetros del formulario
        $search = $request->get('search');
        $estadoGeneral = $request->get('estadoGeneral');
        $estadoInventario = $request->get('estadoInventario');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $sort = $request->get('sort', 'fechaRegistro');
        $direction = $request->get('direction', 'desc');

        // 🔹 Construir consulta
        $query = \App\Models\Inventario::with('moto');

        // 🔍 Filtro de búsqueda (por descripción o modelo de la moto)
        if ($search) {
            $query->where('descripcion', 'LIKE', "%{$search}%")
                ->orWhereHas('moto', function ($q) use ($search) {
                    $q->where('modelo', 'LIKE', "%{$search}%");
                });
        }

        // ⚙️ Filtro por estado general
        if ($estadoGeneral) {
            $query->where('estadoGeneral', $estadoGeneral);
        }

        // 🧰 Filtro por estado de inventario
        if ($estadoInventario) {
            $query->where('estadoInventario', $estadoInventario);
        }

        // 📅 Filtro por rango de fechas
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('fechaRegistro', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            $query->whereDate('fechaRegistro', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            $query->whereDate('fechaRegistro', '<=', $fechaFin);
        }

        // ↕️ Ordenar resultados
        $query->orderBy($sort, $direction);

        // 📄 Paginación
        $inventarios = $query->paginate(10)->appends($request->query());

        // 📤 Retornar vista
        return view('inventario.index', compact('inventarios'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motos = Moto::all();
        return view('Inventario.create', compact('motos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Inventario::create(
            $request->all()
        );
        return redirect()->route('inventario.index')->with('success', 'Inventario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventarios = Inventario::findorfail($id);
        $motos = Moto::all();
        return view('Inventario.edit', compact('inventarios', 'motos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inventarios = Inventario::findorfail($id);
        $inventarios->update(
            $request->all()
        );
        return redirect()->route('inventario.index')->with('success', 'Inventario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventarios = Inventario::findOrFail($id);

        try {
            $inventarios->delete();
            return redirect()->route('inventario.index')
                ->with('success', 'inventario eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('inventario.index')
                ->with('error', 'No se puede eliminar este inventario porque tiene visualizaciones asociadas.');
        }
    }

    public function porMoto($idMoto)
{
    $moto = \App\Models\Moto::with(['cliente', 'marca'])->findOrFail($idMoto);

    $inventarios = \App\Models\Inventario::where('idMoto', $idMoto)
        ->orderBy('created_at', 'desc')
        ->with(['moto'])
        ->get();

    return view('inventario.index', compact('inventarios', 'moto'));
}

}
