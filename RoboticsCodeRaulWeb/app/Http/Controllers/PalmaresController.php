<?php

namespace App\Http\Controllers;

use App\Models\Palmares;
use App\Models\Contest;
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
        $contests = Contest::all();
        return view('palmares.create', compact('contests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'contest_name' => 'required|string',
            'phase_name' => 'required|array',
            'team_name' => 'required|array',
            'place' => 'required|array',
        ]);

        foreach ($request->phase_name as $index => $phase) {
            $palmares = new Palmares();
            $palmares->year = $request->input('year');
            $palmares->contest_name = $request->input('contest_name');
            $palmares->phase_name = $phase;
            $palmares->team_name = $request->team_name[$index];
            $palmares->place = $request->place[$index];
            $palmares->save();
        }

        return redirect()->route('palmares')->with('message', 'Palmarés criado com sucesso.');
    }

    public function destroy(Palmares $palmares)
    {
        //
        $palmares->delete();
        return redirect()->route('palmares')->with('message', 'Classificação removida com sucesso.');
    }
}
