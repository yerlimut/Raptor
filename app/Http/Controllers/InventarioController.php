<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioRequest;
use App\Models\Inventario;
use App\Models\Moto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Lista los inventarios con filtros y ordenados por fecha de creación descendente.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $estadoGeneral = $request->get('estadoGeneral');
        $estadoInventario = $request->get('estadoInventario');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');

        $query = Inventario::with('moto');

        // 🔍 Filtro búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('descripcion', 'LIKE', "%{$search}%")
                    ->orWhereHas('moto', function ($m) use ($search) {
                        $m->where('modelo', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Estado general
        if ($estadoGeneral) {
            $query->where('estadoGeneral', $estadoGeneral);
        }

        // Estado inventario
        if ($estadoInventario) {
            $query->where('estadoInventario', $estadoInventario);
        }

        // Filtro fechas
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('fechaRegistro', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            $query->whereDate('fechaRegistro', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            $query->whereDate('fechaRegistro', '<=', $fechaFin);
        }

        // 🔥 ORDENAR: Último creado PRIMERO (Usando 'created_at' para mayor precisión)
        $inventarios = $query->orderBy('created_at', 'DESC')->paginate(10);

        $volver = route('welcome');

        return view('inventario.index', compact('inventarios', 'volver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $motos = Moto::all();
        $idMoto = $request->get('idMoto'); // viene desde porMoto()

        return view('Inventario.create', compact('motos', 'idMoto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventarioRequest $request)
    {
        $inventario = Inventario::create($request->all());

        // Si venimos desde porMoto
        if ($request->volver === 'porMoto') {
            return redirect()
                ->route('inventario.porMoto', ['idMoto' => $inventario->idMoto])
                ->with('success', 'Inventario creado correctamente.');
        }

        // Si venimos desde listado general
        return redirect()
            ->route('inventario.index')
            ->with('success', 'Inventario creado correctamente.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        // Puedes agregar lógica para ver un solo registro si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventarios = Inventario::findOrFail($id);
        $motos = Moto::all();
        return view('Inventario.edit', compact('inventarios', 'motos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventarioRequest $request, $id)
    {
        $inventarios = Inventario::findOrFail($id);
        $inventarios->update($request->all());

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

    /**
     * Inventarios por Moto
     * Lista los inventarios asociados a una moto específica, ordenados por fecha de creación descendente.
     */
    public function porMoto($idMoto)
    {
        $moto = Moto::with(['cliente', 'marca'])->findOrFail($idMoto);

        $inventarios = Inventario::where('idMoto', $idMoto)
            ->with(['moto'])
            ->orderBy('created_at', 'DESC')  // 🔥 Ordenado: último primero
            ->paginate(10);

        $volver = route('inventario.index');

        return view('inventario.index', compact('inventarios', 'moto', 'volver'));
    }
}
