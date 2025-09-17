<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\marcaMoto;
use App\Models\Moto;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motos = Moto::all();
        return view('Moto.index', compact('motos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $marcasMotos = marcaMoto::all();
        return view('Moto.create', compact('clientes', 'marcasMotos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Moto::create(
            $request->all()
        );

        return redirect()->route('moto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Moto $moto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $moto = Moto::findorfail($id);
        $cliente = Cliente::all();
        $marcaMoto = marcaMoto::all();

        return view('Moto.edit', compact('moto', 'cliente', 'marcaMoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $moto = Moto::findorfail($id);
        $moto->update($request->all());

        return redirect()->route('moto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $moto = Moto::findorfail($id);
        $moto->delete();

        return redirect()->route('moto.index');
    }
}
