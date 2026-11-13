<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
        
        $totalMedicamentos = Medicamento::count();

        
        $totalProveedoresActivos = Proveedor::where('estado', 'Activo')->count();


        $totalEmpleados = Empleado::count();

        
        $valorTotalInventario = Medicamento::all()->sum(function ($medicamento) {
            return $medicamento->inventario * $medicamento->precio;
        });

        return view('dashboard.index', compact(
            'totalMedicamentos',
            'totalProveedoresActivos',
            'totalEmpleados',
            'valorTotalInventario'
        ));
    }
}