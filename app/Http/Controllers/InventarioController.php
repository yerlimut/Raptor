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
    public function index()
    {
        $inventarios = Inventario::all();
        return view('Inventario.index', compact('inventarios'));

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
        return redirect()->route('inventario.index');
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
        $inventarios =Inventario::findorfail($id);
        $motos=Moto::all();
        return view('Inventario.edit', compact('inventarios','motos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inventarios=Inventario::findorfail($id);
        $inventarios->update(
            $request->all()
        );
        return redirect()->route('inventario.index');
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
}
