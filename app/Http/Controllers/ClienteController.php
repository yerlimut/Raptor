<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔹 Parámetros de filtro
        $search = $request->get('search');
        $tipoDocumento = $request->get('tipoDocumento');
        $telefono = $request->get('telefono');
        $direccion = $request->get('direccion');
        $correoDominio = $request->get('correoDominio');
        $fechaInicio = $request->get('fechaInicio');
        $fechaFin = $request->get('fechaFin');
        $sort = $request->get('sort', 'nombre');
        $direction = $request->get('direction', 'asc');

        // 🔹 Consulta base
        $query = \App\Models\Cliente::query();

        // 🔍 Búsqueda general
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('apellido', 'LIKE', "%{$search}%")
                    ->orWhere('numeroDocumento', 'LIKE', "%{$search}%")
                    ->orWhere('telefono', 'LIKE', "%{$search}%")
                    ->orWhere('correoElectronico', 'LIKE', "%{$search}%");
            });
        }

        // 🪪 Tipo de documento
        if ($tipoDocumento) {
            $query->where('tipoDocumento', $tipoDocumento);
        }

        // ☎️ Teléfono
        if ($telefono) {
            $query->where('telefono', 'LIKE', "%{$telefono}%");
        }

        // 🏙️ Dirección
        if ($direccion) {
            $query->where('direccion', 'LIKE', "%{$direccion}%");
        }

        // 📧 Dominio del correo (ej: gmail.com)
        if ($correoDominio) {
            $query->where('correoElectronico', 'LIKE', "%@{$correoDominio}%");
        }

        // 🕓 Filtro por rango de fechas de creación
        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            $query->whereDate('created_at', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            $query->whereDate('created_at', '<=', $fechaFin);
        }

        // 🔢 Ordenar
        $query->orderBy($sort, $direction);

        // 📄 Paginación
        $clientes = $query->paginate(10)->appends($request->query());

        return view('cliente.index', compact('clientes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create(
            $request->all()
        );
        return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findorfail($id);
        return view('Cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findorfail($id);
        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findorfail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente');
    }
}
