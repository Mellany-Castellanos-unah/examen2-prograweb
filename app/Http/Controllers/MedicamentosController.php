<?php

namespace App\Http\Controllers;

use App\Models\Medicamento; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $medicamentos = Medicamento::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%")
                             ->orWhere('codigo', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('medicamentos.index', compact('medicamentos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:medicamentos,codigo',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|in:Antibioticos,Analgesicos,Sueros,Material Quirurgico,Vitaminas',
            'precio' => 'required|numeric|gt:0',
            'costo' => 'required|numeric|gte:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:png,jpg,webp|max:5120', 
            'laboratorio' => 'required|string|max:255',
            'fecha_vencimiento' => 'required|date',
            'numero_lote' => 'required|string|max:255',
        ]);

        $data = $request->except('imagen');
        $data['fecha_registro'] = now();

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/medicamentos'), $filename);
            $data['imagen'] = 'uploads/medicamentos/' . $filename;
        }

        Medicamento::create($data);

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento registrado correctamente en el inventario.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento) 
    {
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento) 
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento) 
    {
        $request->validate([
            'codigo' => 'required|string|unique:medicamentos,codigo,' . $medicamento->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|in:Antibioticos,Analgesicos,Sueros,Material Quirurgico,Vitaminas',
            'precio' => 'required|numeric|gt:0',
            'costo' => 'required|numeric|gte:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:png,jpg,webp|max:5120',
            'laboratorio' => 'required|string|max:255',
            'fecha_vencimiento' => 'required|date',
            'numero_lote' => 'required|string|max:255',
        ]);

        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            if ($medicamento->imagen && file_exists(public_path($medicamento->imagen))) {
                @unlink(public_path($medicamento->imagen));
            }

            $file = $request->file('imagen');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/medicamentos'), $filename);
            $data['imagen'] = 'uploads/medicamentos/' . $filename;
        }

        $medicamento->update($data);

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento) 
    {
        if ($medicamento->imagen && file_exists(public_path($medicamento->imagen))) {
            @unlink(public_path($medicamento->imagen));
        }

        $medicamento->delete();

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento eliminado del sistema.');
    }
}