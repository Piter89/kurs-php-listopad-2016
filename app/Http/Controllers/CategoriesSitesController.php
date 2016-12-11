<?php

namespace App\Http\Controllers;

use App\CategoriesSites;
use Illuminate\Http\Request;

class CategoriesSitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_sites = CategoriesSites::paginate(10);
        return view('categories_sites.index', compact ('categories_sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categories_sites.create');
    }

    /**
     * Store a newly created resource in storage. przechowuje dane
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new CategoriesSites();
        $page ->name = $request->input('name');
        $page->save();
        return redirect('/categories_sites');
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

        $categories_sites = CategoriesSites :: find($id);
        return view('categories_sites.edit', compact('categories_sites'));
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
        $page = CategoriesSites :: find($id);
        $page->name = $request->input ('name');
        $page ->save();
        return redirect('/categories_sites');
    }

    /**
     * Remove the specified resource from storage. usuwnie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = CategoriesSites::find($id);
        $page ->delete();

        return redirect('/categories_sites');
    }
}