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
    public function index()
    {
        $categoriasRepuesto = categoriaRepuesto::all();
        return view('CategoriaRepuesto.index', compact('categoriasRepuesto') );
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