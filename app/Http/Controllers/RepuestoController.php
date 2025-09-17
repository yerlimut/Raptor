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
    public function index()
    {
        $repuestos = Repuesto::all();
        return view('Repuesto.index', compact('repuestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriasRepuesto=categoriaRepuesto::all();
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
        $repuestos =Repuesto::findorfail($id);
        $categoriasRepuesto=categoriaRepuesto::all();
        return view('repuesto.edit', compact('repuestos','categoriasRepuesto'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $repuestos=Repuesto::findorfail($id);
        $repuestos->update(
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
    }}