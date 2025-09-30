<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Moto;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        $diagnosticos = Diagnostico::all();
        return view('Diagnostico.index', compact('diagnosticos'));
    }

    public function create()
    {
        $motos = Moto::all();
        return view('Diagnostico.create', compact('motos'));
    }

    public function store(Request $request)
    {
        Diagnostico::create(
            $request->all()
        );
        return redirect()->route('diagnostico.index');
    }

    public function show(Diagnostico $diagnostico)
    {
        //
    }

    public function edit($id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);
        $motos = Moto::all();
        return view('Diagnostico.edit', compact('diagnosticos', 'motos'));
    }

    public function update(Request $request, $id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);
        $diagnosticos->update(
            $request->all()
        );
        return redirect()->route('diagnostico.index');
    }

    public function destroy($id)
    {
        $diagnosticos = Diagnostico::findOrFail($id);

        try {
            $diagnosticos->delete();
            return redirect()->route('diagnostico.index')
                ->with('success', 'Diagnóstico eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('diagnostico.index')
                ->with('error', 'No se puede eliminar este diagnóstico porque tiene registros asociados.');
        }
    }
}
