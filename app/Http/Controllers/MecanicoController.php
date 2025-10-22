<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔍 Obtener parámetros de búsqueda y filtros
        $search = $request->get('search');
        $tipoDocumento = $request->get('tipoDocumento');
        $especialidad = $request->get('especialidad');
        $orden = $request->get('orden');

        // 🔧 Construir consulta base
        $query = Mecanico::query();

        // Filtro de búsqueda general (nombre, apellido, número documento)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'LIKE', '%' . $search . '%')
                    ->orWhere('apellido', 'LIKE', '%' . $search . '%')
                    ->orWhere('numeroDocumento', 'LIKE', '%' . $search . '%');
            });
        }

        // Filtro por tipo de documento
        if ($tipoDocumento) {
            $query->where('tipoDocumento', $tipoDocumento);
        }

        // Filtro por especialidad
        if ($especialidad) {
            $query->where('especialidad', $especialidad);
        }

        // Filtro de ordenamiento alfabético
        if ($orden == 'asc') {
            $query->orderBy('nombre', 'asc');
        } elseif ($orden == 'desc') {
            $query->orderBy('nombre', 'desc');
        }

        // Obtener resultados paginados
        $mecanicos = $query->paginate(10);
        $especialidades = Mecanico::select('especialidad')->distinct()->get();


        return view('Mecanico.index', compact('mecanicos', 'search', 'tipoDocumento', 'especialidad', 'orden', 'especialidades'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Mecanico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mecanico::create(
            $request->all()
        );

        return redirect()->route('mecanico.index')->with('success', 'Mecanico creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mecanico $mecanico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mecanico = Mecanico::findorfail($id);
        return view('Mecanico.edit', compact('mecanico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mecanico = Mecanico::findorfail($id);
        $mecanico->update($request->all());

        return redirect()->route('mecanico.index')->with('success', 'Mecanico Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mecanico = Mecanico::findorfail($id);
        $mecanico->delete();
        return redirect()->route('mecanico.index')->with('success', 'Mecanico Eliminado correctamente');
    }
}
