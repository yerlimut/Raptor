<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Moto;
use App\Models\Repuesto;
use App\Models\Inventario;
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

        // Retornar la vista con los datos
        return view('welcome', compact('ContarClientes', 'ContarMotos', 'ContarRepuestos', 'ContarInventarios'));
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
