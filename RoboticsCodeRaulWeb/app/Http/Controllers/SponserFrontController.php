<?php

namespace App\Http\Controllers;

use App\Models\Sponser_front;
use App\Models\Sponser;
use Illuminate\Http\Request;

class SponserFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sponsers = Sponser::orderBy('created_at', 'desc')->paginate(10);
        return view('sponsers_front.index', compact('sponsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponser $sponsers)
    {
        //
        return view('sponsers_front.show', compact('sponsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponser_front $sponser_front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponser_front $sponser_front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponser_front $sponser_front)
    {
        //
    }
}
