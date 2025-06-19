<?php

namespace App\Http\Controllers;

use App\Models\NewsFront;
use App\Models\News;
use Illuminate\Http\Request;

class NewsFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $news = News::orderBy('news_date', 'desc')->paginate(9);
        return view('news_front.index', compact('news'));
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
    public function show(News $news)
    {
        return view('news_front.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsFront $newsFront)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsFront $newsFront)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsFront $newsFront)
    {
        //
    }
}
