<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryFront;
use Illuminate\Http\Request;

class GalleryFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $photo = Gallery::all();
        return view('gallery_front.index', compact('photo'));
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
    public function show(GalleryFront $galleryFront)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryFront $galleryFront)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryFront $galleryFront)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryFront $galleryFront)
    {
        //
    }
}
