<?php

namespace App\Http\Controllers;

use App\Models\Sponser;

class FrontController extends Controller
{
    public function about_us()
    {
        //
        return view('home.about_us');
    }

    public function contest()
    {
        //
        return view('home.contests');
    }

    public function index()
    {
        //
        $sponsers = Sponser::all();
        return view('home.index', compact('sponsers'));
    }
}
