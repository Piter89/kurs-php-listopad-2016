<?php

namespace App\Http\Controllers;


use App\Pages;
use App\Categories;

use Illuminate\Http\Request;

class PagesController extends Controller


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
        $pages = Pages::paginate(10);
        return view('pages.index', compact ('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view ('pages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage. przechowuje dane
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Pages();
        $page ->title = $request->input('title');
        $page->content = $request->input('content');
        $page->category_id = $request->input('category_id');
        $page->save();
        return redirect('/pages');
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

        $page = Pages :: find($id);
        $categories = Categories::all();
        return view('pages.edit', compact('page', 'categories'));
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
        $page = Pages :: find($id);
        $page->title = $request->input ('title');
        $page->content = $request->input ('content');
        $page->category_id = $request->input('category_id');
        $page ->save();
        return redirect('/pages');

    }

    /**
     * Remove the specified resource from storage. usuwnie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        $page ->delete();

        return redirect('/pages');
    }
}
