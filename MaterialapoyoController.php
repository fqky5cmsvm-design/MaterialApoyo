<?php

namespace App\Http\Controllers;

use App\Models\MaterialApoyo;
use Illuminate\Http\Request;

class MaterialapoyoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materialapoyo = MaterialApoyo::all();
        return view('MaterialApoyo.index', compact('materialapoyo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MaterialApoyo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
        #dd($request->all());
        $validateData = $request->validate([
            'no_unidad' => 'required|string|max:50',
            'materia' => 'required|string|max:100',
            'grupo' => 'required|string',
            'periodo' => 'required|string|max:100',
            'rfc' => 'required|string|max:133',
            'id_material_apoyo' => 'required|string|max:100',
            'materiales_apoyo' => 'required|string|max:255',
            'materiales_apoyo1' => 'required|string',
        ], [
            'no_unidad.required' => 'Numero de control es obligatorio',
            'materia.required' => 'La materia es obligatoria',
            'grupo.required' => 'El grupo es obligatorio',
            'periodo.required' => 'El periodo es obligatorio',
            'rfc.required' => 'El RFC es obligatorio',
            'id_material_apoyo.required' => 'El ID del material de apoyo es obligatorio',
            'materiales_apoyo.required' => 'Los materiales de apoyo son obligatorios',
            'materiales_apoyo1.required' => 'Los materiales de apoyo adicionales son obligatorios',
        ]);
        #dd($validateData);
        try {
            // Crear el nuevo material de apoyo
            MaterialApoyo::create($validateData);
            #dd(MaterialApoyo::create($validateData));
            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('MaterialApoyo.index')
                ->with('success', 'Material de apoyo creado exitosamente');
                
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear el material de apoyo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = MaterialApoyo::findorOFail($id);
        return view('MaterialApoyo.show', compact('materialapoyos'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('MaterialApoyo.edit', compact('materialapoyos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaterialApoyo $materialapoyos)
    {
        $validatedData = $request->validate([
            'materia' => 'required|string|max:255',
            'grupo' => 'required|string',
            'periodo' => 'required|string|max:10',
            'rfc' => 'required|string|max:255',
            'id_material_apoyo' => 'required|string|max:255',
            'materiales_apoyo' => 'required|string|max:255',
            'materiales_apoyo1' => 'required|string',
        ], [
            'materia.required' => 'El nombre es obligatorio',
            'grupo.required' => 'El grupo es obligatorio',
            'periodo.required' => 'El periodo es obligatorio',
            'rfc.required' => 'El RFC es obligatorio',
            'id_material_apoyo.required' => 'El id es obligatorio',
            'materiales_apoyo.required' => 'Por favor ingresa un material',
            'materiales_apoyo1.required' => 'Ingresa un material',
        ]);

        try {
            $materialapoyos->update($validatedData);

            return redirect()
                ->route('MaterialApoyo.index')
                ->with('success', 'Material de apoyo actualizado exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar el material de apoyo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( MaterialApoyo $materialapoyos)
    {
        try {
            $id = $materialapoyos-> id;
            $materialapoyos->delete();

            return redirect()
                ->route('MaterialApoyo.index')
                ->with('success', "El material de apoyo '$id' fue eliminado exitosamente");
                
        } catch (\Exception $e) {
            return redirect()
                ->route('MaterialApoyo.index')
                ->with('error', 'Error al eliminar el material de apoyo: ' . $e->getMessage());
        }
    }
}
