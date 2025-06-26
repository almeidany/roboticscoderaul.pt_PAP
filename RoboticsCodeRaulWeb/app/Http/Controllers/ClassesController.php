<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_year' => 'required|integer',
            'class' => 'required|array',

        ]);

        foreach ($request->class as $classLetter) {
            $class = new Classes();
            $class->class = $classLetter;
            $class->class_year = $request->input('class_year');
            $class->save();
        }

        return redirect()->route('classes')->with('message', 'Turmas criadas com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
        $classes->delete();
        return redirect()->route('classes')->with('message', 'Turma removida com sucesso.');
    }
}
