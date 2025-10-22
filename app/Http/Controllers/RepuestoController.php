<?php

namespace App\Http\Controllers;

use App\Models\categoriaRepuesto;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $idCategoria = $request->get('idCategoria');
        $precioMin = $request->get('precio_min');
        $precioMax = $request->get('precio_max');
        $stock = $request->get('stock');

        $query = Repuesto::with('categoria');

        // Filtro de búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                    ->orWhere('marca', 'like', "%$search%");
            });
        }

        // Filtro por categoría
        if ($idCategoria) {
            $query->where('idCategoria', $idCategoria);
        }

        // Filtro por rango de precios
        if ($precioMin) {
            $query->where('precio', '>=', $precioMin);
        }
        if ($precioMax) {
            $query->where('precio', '<=', $precioMax);
        }

        // Filtro por nivel de stock
        if ($stock) {
            switch ($stock) {
                case 'bajo':
                    $query->where('stock', '<', 5);
                    break;
                case 'medio':
                    $query->whereBetween('stock', [5, 20]);
                    break;
                case 'alto':
                    $query->where('stock', '>', 20);
                    break;
            }
        }

        $repuestos = $query->paginate(10);
        $categorias = CategoriaRepuesto::all();

        return view('repuesto.index', compact('repuestos', 'categorias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriasRepuesto = categoriaRepuesto::all();
        return view('Repuesto.create', compact('categoriasRepuesto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Repuesto::create(
            $request->all()
        );
        return redirect()->route('repuesto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $repuesto = Repuesto::findorfail($id);
        $categoriasRepuesto = categoriaRepuesto::all();
        return view('repuesto.edit', compact('repuesto', 'categoriasRepuesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $repuesto = Repuesto::findorfail($id);
        $repuesto->update(
            $request->all()
        );
        return redirect()->route('repuesto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $repuestos = Repuesto::findOrFail($id);

        try {
            $repuestos->delete();
            return redirect()->route('contenido.index')
                ->with('success', 'Contenido eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('contenido.index')
                ->with('error', 'No se puede eliminar este contenido porque tiene visualizaciones asociadas.');
        }
    }
}
