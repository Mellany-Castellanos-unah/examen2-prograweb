<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $proveedores = Proveedor::when($search, function ($query, $search) {
                return $query->where('empresa', 'like', "%{$search}%")
                             ->orWhere('rtn', 'like', "%{$search}%")
                             ->orWhere('contacto', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('proveedores.index', compact('proveedores', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedores,rtn',
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => ['required', 'regex:/^[2389]\d{7}$/'],
            'categoria' => 'required|in:Farmacos,Material Quirurgico,Equipos',
            'limite_credito' => 'required|numeric|gte:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
        ], [
            'rtn.digits' => 'El RTN debe contener exactamente 14 dígitos numéricos.',
            'rtn.unique' => 'Este RTN ya se encuentra registrado en el sistema.',
            'telefono.regex' => 'El teléfono debe ser de 8 dígitos y comenzar con 2, 3, 8 o 9.',
        ]);

        $data = $request->all();
        $data['fecha_registro'] = now();

        Proveedor::create($data);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado exitosamente en el sistema.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedores,rtn,' . $proveedor->id,
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => ['required', 'regex:/^[2389]\d{7}$/'],
            'categoria' => 'required|in:Farmacos,Material Quirurgico,Equipos',
            'limite_credito' => 'required|numeric|gte:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
        ], [
            'rtn.digits' => 'El RTN debe contener exactamente 14 dígitos numéricos.',
            'rtn.unique' => 'Este RTN ya se encuentra registrado en el sistema.',
            'telefono.regex' => 'El teléfono debe ser de 8 dígitos y comenzar con 2, 3, 8 o 9.',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Información del proveedor actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado del sistema con éxito.');
    }
}
