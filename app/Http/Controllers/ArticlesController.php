<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Categories;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   //-  uruchamia się sama automatycznie
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::paginate(10);
        return view('articles.index', compact ('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view ('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage. przechowuje dane
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Articles();
        $article ->title = $request->input('title');
        $article->content = $request->input('content');
        $article->categories_id = $request->input('categories_id');
        $article->save();
        return redirect('/article');
    }

    /**
     * Display the specified resource. wyświetla odpowiedni rekord
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. edycja nowego zasobu
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Articles :: find($id);
        $categories = Categories::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Articles :: find($id);
        $article->title = $request->input ('title');
        $article->content = $request->input ('content');
        $article->categories_id = $request->input('categories_id');
        $article ->save();
        return redirect('/article');

    }

    /**
     * Remove the specified resource from storage. usuwnie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        $article ->delete();

        return redirect('/article');
    }
}
