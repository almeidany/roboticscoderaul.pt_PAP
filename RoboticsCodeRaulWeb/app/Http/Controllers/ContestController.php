<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contest = Contest::all();
        return view('contest.index', compact('contest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:contests,name',
        ]);

        $contest = new Contest();
        $contest->name = $request->name;
        $contest->save();
        return redirect()->route('contests')->with('message', 'Concurso adicionado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contest $contest)
    {
        //
        $contest->delete();
        return redirect()->route('contests')->with('message', 'Concurso removido com sucesso!');
    }
}
