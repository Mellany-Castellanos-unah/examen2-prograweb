<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $empleados = Empleado::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%")
                             ->orWhere('apellido', 'like', "%{$search}%")
                             ->orWhere('identidad', 'like', "%{$search}%")
                             ->orWhere('correo', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('empleados.index', compact('empleados', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:empleados,correo|max:255',
            'cargo' => 'required|in:Regente Farmaceutico,Asistente de farmacia,jefe de bodega,despachador,cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ], [
            'identidad.digits' => 'El número de identidad debe contener exactamente 13 dígitos sin guiones.',
            'identidad.unique' => 'Esta identidad ya se encuentra registrada en el sistema.',
            'salario.gt' => 'El salario base debe ser mayor a 0.',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Colaborador registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad,' . $empleado->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:empleados,correo,' . $empleado->id,
            'cargo' => 'required|in:Regente Farmaceutico,Asistente de farmacia,jefe de bodega,despachador,cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ], [
            'identidad.digits' => 'El número de identidad debe contener exactamente 13 dígitos sin guiones.',
            'identidad.unique' => 'Esta identidad ya se encuentra registrada en el sistema.',
            'salario.gt' => 'El salario base debe ser mayor a 0.',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Información del empleado actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Colaborador eliminado con éxito.');
    }
}
