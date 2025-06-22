<?php

namespace App\Http\Controllers;

use App\Models\Palmares;
use Illuminate\Http\Request;

class PalmaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $palmares = Palmares::all();
        return view('palmares.index', compact('palmares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('palmares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:palmares,name',
        ]);

        $palmares = new Palmares();
        $palmares->name = $request->name;
        $palmares->save();
        return redirect()->route('palmares')->with('message', 'Concurso adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Palmares $palmares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Palmares $palmares)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Palmares $palmares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Palmares $palmares)
    {
        //
        $palmares->delete();
        return redirect()->route('palmares')->with('message', 'Concurso removido com sucesso!');
    }
}
