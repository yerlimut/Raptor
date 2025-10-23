<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\marcaMoto;
use App\Models\Moto;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔍 Obtener parámetros de filtro
        $search = $request->get('search');
        $idCliente = $request->get('idCliente');
        $idMarca = $request->get('idMarca');
        $año = $request->get('año');
        $orden = $request->get('orden');

        // Construir consulta base con relaciones
        $query = Moto::with(['cliente', 'marca']);

        // Filtro de búsqueda general (modelo o placa)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('modelo', 'LIKE', "%$search%")
                    ->orWhere('placa', 'LIKE', "%$search%");
            });
        }

        // Filtro por cliente
        if ($idCliente) {
            $query->where('idCliente', $idCliente);
        }

        // Filtro por marca
        if ($idMarca) {
            $query->where('idMarca', $idMarca);
        }

        // Filtro por año
        if ($año) {
            $query->where('año', $año); // usa where('año') si el campo se llama literalmente así
        }

        // Orden
        if ($orden == 'asc') {
            $query->orderBy('modelo', 'asc');
        } elseif ($orden == 'desc') {
            $query->orderBy('modelo', 'desc');
        }

        // Ejecutar consulta
        $motos = $query->paginate(10)->withQueryString();

        // Obtener datos para filtros
        $clientes = Cliente::orderBy('nombre')->get();
        $marcas = marcaMoto::orderBy('nombreMarca')->get();

        // Retornar vista
        return view('Moto.index', compact('motos', 'clientes', 'marcas', 'search', 'idCliente', 'idMarca', 'año', 'orden'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $idCliente = $request->idCliente;
        $marcasMotos = marcaMoto::all();

        if ($idCliente) {
            // Si llega un cliente específico, solo obtenemos ese
            $clientes = Cliente::where('id', $idCliente)->get();
        } else {
            // Si no llega ninguno, mostramos todos
            $clientes = Cliente::all();
        }

        return view('Moto.create', compact('clientes', 'marcasMotos', 'idCliente'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 🔹 Dejamos este método exactamente como tú lo tienes
        Moto::create(
            $request->all()
        );

        return redirect()->route('moto.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $moto = Moto::findOrFail($id);
        $marcas = marcaMoto::all();
        $idCliente = $moto->idCliente;

        // Solo traemos el cliente dueño de la moto (no todos)
        $clientes = Cliente::where('id', $idCliente)->get();

        return view('Moto.edit', compact('moto', 'clientes', 'marcas', 'idCliente'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $moto = Moto::findOrFail($id);
        $moto->update($request->all());

        return redirect()->route('moto.index', ['idCliente' => $moto->idCliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $moto = Moto::findOrFail($id);
        $idCliente = $moto->idCliente;

        $moto->delete();

        // 🔹 También redirigimos al índice filtrado
        return redirect()->route('moto.index', ['idCliente' => $idCliente]);
    }
}
