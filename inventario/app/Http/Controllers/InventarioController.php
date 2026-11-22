<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $inventario = Inventario::all();

        return view('inventario.index', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dato= $request->validate([
            'codigo'=>'required|string|unique:inventarios,codigo',
            'nombre'=>'required|string|max:100',
            'precio'=>'required|numeric|min:0',
            'existencias'=>'required|integer|min:0'
        ]);

        Inventario::create($dato);

        return redirect()->route('inventario.index');
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
        $inventario = Inventario::findOrFail($id);

        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dato= $request->validate([
            'codigo'=>'required|string|unique:inventarios,codigo,' .$id,
            'nombre'=>'required|string|max:100',
            'precio'=>'required|numeric|min:0',
            'existencias'=>'required|integer|min:0'
        ]);

         $inventario = Inventario::findOrFail($id);

         $inventario->update($dato);
         return redirect()->route('inventario.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $inventario = Inventario::findOrFail($id);

        $inventario->delete();

         return redirect()->route('inventario.index');

    }
}
