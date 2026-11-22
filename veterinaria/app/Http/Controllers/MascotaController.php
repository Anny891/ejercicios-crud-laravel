<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mascota = Mascota::all();

        return view('mascota.index', compact('mascota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dato = $request->validate([
            'codigo'=>'required|string|unique:mascotas,codigo',
            'nombre'=>'required|string|max:80',
            'especie'=>'required|in:Perro,Gato,Otro',
            'propietario'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date'
        ]);

        Mascota::create($dato);

        return redirect()->route('mascota.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
