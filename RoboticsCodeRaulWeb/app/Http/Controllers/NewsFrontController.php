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

    public function show(News $news)
    {
        return view('news_front.show', compact('news'));
    }
}
