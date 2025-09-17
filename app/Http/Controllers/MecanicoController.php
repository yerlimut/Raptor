<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mecanicos = Mecanico::all();
        return view('Mecanico.index' , compact('mecanicos'));
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

        return redirect()->route('mecanico.index');
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
        return view('Mecanico.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mecanico = Mecanico::findorfail($id);
        $mecanico->update($request->all());

        return redirect()->route('mecanico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $mecanico = Mecanico::findorfail($id);
        $mecanico->delete();
        return redirect()->route('mecanico.index');
    }
}
