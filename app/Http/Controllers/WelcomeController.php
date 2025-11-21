<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Moto;
use App\Models\Repuesto;
use App\Models\Inventario;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ejemplo: contar los registros principales
        $ContarClientes = Cliente::count();
        $ContarMotos = Moto::count();
        $ContarRepuestos = Repuesto::count();
        $ContarInventarios = Inventario::count();
        $countPendiente = OrdenTrabajo::where('estado', 'pendiente')->count();
        $countEnProceso = OrdenTrabajo::where('estado', 'en proceso')->count();
        $countFinalizado = OrdenTrabajo::where('estado', 'finalizado')->count();
        $countCancelado = OrdenTrabajo::where('estado', 'cancelado')->count();


        // Retornar la vista con los datos
        return view('welcome', compact(
            'ContarClientes',
            'ContarMotos',
            'ContarRepuestos',
            'ContarInventarios',
            'countPendiente',
            'countEnProceso',
            'countFinalizado',
            'countCancelado',
        ));
    }

    public function ContarClientes()
    {
        $ContarClientes = Cliente::count();
        return $ContarClientes;
    }

    public function ContarMotos()
    {
        $ContarMotos = Moto::count();
        return $ContarMotos;
    }

    public function ContarRepuestos()
    {
        $ContarRepuestos = Repuesto::count();
        return $ContarRepuestos;
    }

    public function ContarInventarios()
    {
        $ContarInventarios = Inventario::count();
        return $ContarInventarios;
    }
}
