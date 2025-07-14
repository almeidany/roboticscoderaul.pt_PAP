<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Contest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gallery = Gallery::all();
        return view('gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contests = Contest::all();
        return view('gallery.create', compact('contests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required', // importante validar o campo, mesmo que único
            'photo.*' => 'image|mimes:jpeg,png,jpg|max:10024',
            'title' => 'required|string|max:255',
            'contest' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        $photos = $request->file('photo');

        // Garante que $photos seja um array mesmo com uma única imagem
        if (!is_array($photos)) {
            $photos = [$photos];
        }

        foreach ($photos as $file) {
            $extension = $file->getClientOriginalExtension();
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('title'));
            $name = $title . '_' . time() . '_' . uniqid() . '.' . $extension;
            $file->storeAs('images/gallery', $name);

            $photo = new Gallery();
            $photo->photo = $name;
            $photo->title = $request->input('title');
            $photo->contest = $request->input('contest');
            $photo->year = $request->input('year');
            $photo->save();
        }

        return redirect()->route('gallery')->with('message', 'Fotos enviadas com sucesso!');
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
        if ($photo->photo) {
            $filePath = public_path('images/gallery/' . $photo->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $photo->delete();
        return redirect()->route('gallery')->with('message', 'Foto eliminada com sucesso!');
    }

    public function show(Gallery $photo)
    {
        return view('gallery.show', compact('photo'));
    }
}
