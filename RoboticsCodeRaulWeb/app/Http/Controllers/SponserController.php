<?php

namespace App\Http\Controllers;

use App\Models\Sponser;
use Illuminate\Http\Request;

class SponserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sponsers = Sponser::orderBy('created_at', 'desc')->paginate(10);;
        return view('sponsers.index', compact('sponsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sponsers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'photo' => 'required|image|mimes:png|max:2048',
            'enterprise_name' => 'required|string|max:70',
            'designation' => 'required|string',
            'link' => 'required|url',
        ]);
        $sponsers = new Sponser();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $enterpriseName = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('enterprise_name'));
            $filename = $enterpriseName . '_' . time() . '.' . $extension;
            $path = $file->storeAs('images/sponsers', $filename, 'public');
            $sponsers->photo = $filename;
        }
        $sponsers->enterprise_name = $request->input('enterprise_name');
        $sponsers->designation = $request->input('designation');
        $sponsers->link = $request->input('link');

        $sponsers->save();
        return redirect()->route('sponsers')->with('success', 'Patrocinador Adicionado com Sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponser $sponsers)
    {
        //
        return view('sponsers.show', compact('sponsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponser $sponsers)
    {
        //
        return view('sponsers.edit', compact('sponsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponser $sponsers)
    {
        //
        $request->validate([
            'photo' => 'nullable|image|mimes:png|max:2048',
            'enterprise_name' => 'required|string|max:70',
            'designation' => 'required|string',
            'link' => 'required|url',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $enterpriseName = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('enterprise_name'));
            $filename = $enterpriseName . '_' . time() . '.' . $extension;
            $path = $file->storeAs('images/sponsers', $filename, 'public');
            $sponsers->photo = $filename;
        }

        $sponsers->enterprise_name = $request->input('enterprise_name');
        $sponsers->designation = $request->input('designation');
        $sponsers->link = $request->input('link');

        $sponsers->save();

        return redirect()->route('sponsers')->with('message', 'Patrocinador atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponser $sponsers)
    {
        //
        $sponsers->delete();
        return redirect()->route('sponsers')->with('message', 'Patrocinador Removido com Sucesso.');
    }
}
