<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Palmares;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$photo = Gallery::all();
        return view('gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Palmares $palmares)
    {
        //
        $palmares = Palmares::all();
        return view('gallery.create', compact('palmares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:10024',
            'title' => 'required|string|max:255',
            'palmares' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $photo = new Gallery();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('title'));
            $name = $title . '_' . time() . '.' . $extension;
            $path = $file->storeAs('public/images/gallery', $name);
            $photo->photo = $name;
        }

        $photo->title = $request->input('title');
        $photo->palmares = $request->input('palmares');
        $photo->year = $request->input('year');
        //log de debug dd;
        $photo->save();

        return redirect()->route('gallery')->with('message', 'Fotografia adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $photo)
    {
        //
        return view('gallery.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $photo)
    {
        //
    }
}
