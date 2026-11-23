<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tarea = Tarea::all();

        return view('tarea.index', compact('tarea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dato = $request->validate([
            'titulo'=>'required|string|max:150',
            'descripcion'=>'required|string|max:500',
            'responsable'=>'required|string|max:100',
            'fecha_limite'=>'required|date',
            'estado'=>'required|string|in:pendiente,proceso,completada'
        ]);

        Tarea::create($dato);

        return redirect()->route('tarea.index');
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
        $tarea = Tarea::findOrFail($id);

        return view('tarea.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $dato = $request->validate([
            'titulo'=>'required|string|max:150',
            'descripcion'=>'required|string|max:500',
            'responsable'=>'required|string|max:100',
            'fecha_limite'=>'required|date',
            'estado'=>'required|string|in:pendiente,proceso,completada'
        ]);
        $tarea = Tarea::findOrFail($id);
        $tarea->update($dato);
        return redirect()->route('tarea.index')->with('success','editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect()->route('tarea.index')->with('success','eliminado correctamente');
    }
}
