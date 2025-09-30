<?php

namespace App\Http\Controllers;

use App\Models\marcaMoto;
use Illuminate\Http\Request;

class MarcaMotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcasMoto = marcaMoto::all();
         return view('MarcaMoto.index', compact('marcasMoto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MarcaMoto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        marcaMoto::create(
            $request->all()
        );
        return redirect()->route('marcaMoto.index')->with('success', 'Marca  creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(marcaMoto $marcaMoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marcasMoto = marcaMoto::findorfail($id);
        return view('MarcaMoto.edit', compact('marcasMoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marcasMoto = marcaMoto::findorfail($id);
        $marcasMoto->update($request->all());
        return redirect()->route('marcaMoto.index')->with('success', 'Marca actualizada  correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marcasMoto =marcaMoto::findorfail($id);
        $marcasMoto->delete();
        return redirect()->route('marcaMoto.index')->with('success', 'Marca eliminada correctamente');
    }
}