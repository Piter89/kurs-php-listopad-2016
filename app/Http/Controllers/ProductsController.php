<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\CategoriesSites;

class ProductsController extends Controller
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
        $products = Products::paginate(10);
        return view('products.index', compact ('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        return view ('products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage. przechowuje dane
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Products();
        $products->name = $request->input('name');
        $products ->description = $request->input('description');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');
        $products->save();
        return redirect('/products');
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

        $products = Products :: find($id);
        $categories_sites = CategoriesSites::all();
        return view('products.edit', compact('products', 'categories_sites'));


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
        $products = Products :: find($id);
        $products->name = $request->input('name');
        $products ->description = $request->input('description');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');
        $products ->save();
        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage. usuwnie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products ->delete();

        return redirect('/products');
    }
}
