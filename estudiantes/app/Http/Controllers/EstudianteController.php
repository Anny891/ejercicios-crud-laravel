<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estudiante = Estudiante::all();

        return view('estudiante.index', compact('estudiante'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dato = $request->validate([
            'numero_cuenta'=>'required|string|unique:estudiantes,numero_cuenta',
            'nombre'=>'required|string|max:100',
            'correo'=>'required|email|unique:estudiantes,correo',
            'fecha_nacimiento'=>'required|date'
        ]);

        Estudiante::create($dato);

        return redirect()->route('estudiante.index')->with('success', 'guardo correcto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudiante'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dato = $request->validate([
            'numero_cuenta'=>'required|string|unique:estudiantes,numero_cuenta,' .$id,
            'nombre'=>'required|string|max:100',
            'correo'=>'required|email|unique:estudiantes,correo,' .$id,
            'fecha_nacimiento'=>'required|date'
        ]);

        $estudiante = Estudiante::findOrFail($id);

        $estudiante->update($dato);
         return redirect()->route('estudiante.index')->with('success', 'editado correcto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $estudiante = Estudiante::findOrFail($id);

          $estudiante->delete();
         return redirect()->route('estudiante.index')->with('success', 'eliminado correcto');

    }
}
