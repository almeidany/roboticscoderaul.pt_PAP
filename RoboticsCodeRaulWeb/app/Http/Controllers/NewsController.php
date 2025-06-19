<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $news = News::orderBy('created_at', 'desc')->paginate(10); // Paginação de 10 itens por página
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10MB max size in KB
            'title' => 'required|string|max:255',
            'news' => 'required|string',
            'news_date' => 'required|date',
            'author_user' => 'required|string|max:255',
        ]);


        $news = new News();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('title'));
            $name = $title . '_' . time() . '.' . $extension;
            $path = $file->storeAs('images/news', $name);
            $news->photo = $name;
        }

        $news->title = $request->input('title');
        $news->news = $request->input('news'); // Considerar usar Purifier
        $news->news_date = $request->input('news_date');
        $news->author_user = $request->input('author_user');

        $news->save();

        return redirect()->route('news')->with('message', 'Notícia criada com sucesso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10MB max size in KB
            'title' => 'required|string|max:255',
            'news' => 'required|string',
            'news_date' => 'required|date',
            'author_user' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $request->input('title'));
            $name = $title . '_' . time() . '.' . $extension;
            $path = $file->storeAs('images/news', $name);
            $news->photo = $name;
        }

        $news->title = $request->title;
        $news->news = $request->news; // Considerar usar Purifier
        $news->news_date = $request->news_date;
        $news->author_user = $request->author_user;
        $news->save();
        return redirect()->route('news')->with('message', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->route('news')->with('message', 'Notícia excluída com sucesso!');
    }
}
