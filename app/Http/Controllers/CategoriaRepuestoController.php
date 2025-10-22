<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRepuestoRequest;
use App\Models\categoriaRepuesto;
use Illuminate\Http\Request;

class CategoriaRepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔍 Parámetros de filtro
        $search = $request->get('search');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $sort = $request->get('sort', 'nombreCategoria');
        $direction = $request->get('direction', 'asc');

        // 🔹 Construcción de consulta
        $query = \App\Models\CategoriaRepuesto::query();

        // 🔍 Filtro por búsqueda general
        if ($search) {
            $query->where('nombreCategoria', 'LIKE', "%{$search}%");
        }

        // 📅 Filtro por rango de fechas
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            $query->whereDate('created_at', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            $query->whereDate('created_at', '<=', $fechaFin);
        }

        // 🔢 Ordenar resultados
        $query->orderBy($sort, $direction);

        // 📄 Paginación
        $categorias = $query->paginate(10)->appends($request->query());

        // 📤 Retornar vista
        return view('categoriaRepuesto.index', compact('categorias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CategoriaRepuesto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRepuestoRequest $request)
    {
        categoriaRepuesto::create(
            $request->all()
        );
        return redirect()->route('categoriaRepuesto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoriaRepuesto $categoriaRepuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoriasRepuesto = categoriaRepuesto::findorfail($id);
        return view('categoriaRepuesto.edit', compact('categoriasRepuesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRepuestoRequest $request, $id)
    {
        $categoriasRepuesto = categoriaRepuesto::findorfail($id);
        $categoriasRepuesto->update($request->all());
        return redirect()->route('categoriaRepuesto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoriasRepuesto = categoriaRepuesto::findorfail($id);
        $categoriasRepuesto->delete();
        return redirect()->route('categoriaRepuesto.index');
    }
}
