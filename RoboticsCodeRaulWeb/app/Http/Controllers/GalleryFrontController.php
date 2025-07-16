<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryFront;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contestID = DB::table('galleries')
            ->select('contest_id', 'year')
            ->distinct()
            ->get()
            ->map(function ($item) {
                $contest = Contest::find($item->contest_id);
                return (object)[
                    'id' => $item->contest_id,
                    'year' => $item->year,
                    'name' => $contest ? $contest->name : 'Desconhecido'
                ];
            })
            ->unique(fn($item) => $item->id . '-' . $item->year)
            ->sortByDesc('year')
            ->values();

        // Pega o filtro do request
        $selectedContest = $request->input('contest_id');

        if ($selectedContest && $selectedContest !== 'all') {
            $galleries = Gallery::where('contest_id', $selectedContest)->get();
        } else {
            $galleries = Gallery::all();
        }

        $contests = Contest::all();

        return view('gallery_front.index', compact('galleries', 'contests', 'contestID', 'selectedContest'));
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
