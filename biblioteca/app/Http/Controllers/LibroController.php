<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $libro = Libro::all();
        return view('libro.index', compact('libro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dato = $request->validate([
            'codigo'=> 'required|string|unique:libros,codigo',
            'titulo'=> 'required|string|max:150',
            'autor'=> 'required|string|max:100',
            'anio_publicacion' => 'required|integer|between:1450,2026'
        ]);

        Libro::create($dato);

        return redirect()->route('libro.index');
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
        $libro = Libro::findOrFail($id);

        return view('libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $dato = $request->validate([
            'codigo'=> 'required|string|unique:libros,codigo,' .$id,
            'titulo'=> 'required|string|max:150',
            'autor'=> 'required|string|max:100',
            'anio_publicacion' => 'required|integer|between:1450,2026'
        ]);

        $libro = Libro::findOrFail($id);

        $libro->update($dato);
        
        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
