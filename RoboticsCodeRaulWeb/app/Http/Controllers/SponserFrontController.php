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

    public function show(Sponser $sponsers)
    {
        //
        return view('sponsers_front.show', compact('sponsers'));
    }
}
