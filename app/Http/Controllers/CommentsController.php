<?php

namespace App\Http\Controllers;

use App\CategoriesSites;
use Illuminate\Http\Request;
use App\Comments;
class CommentsController extends Controller


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
        $comments = Comments::paginate(10);
        return view('comments.index', compact ('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comments = Comments::all();
        return view ('comments.create', compact('comments'));
    }

    /**
     * Store a newly created resource in storage. przechowuje dane
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Comments();
        $page ->title = $request->input('title');
        $page ->subtitle = $request->input('subtitle');
        $page->content = $request->input('content');
        $page->category_id = $request->input('category_id');
        $page->save();
        return redirect('/comments');
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

        $comment = Comments :: find($id);
        $categories_sites = CategoriesSites::all();
        return view('comments.edit', compact('comment', 'categories_sites'));


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
        $page = Comments :: find($id);
        $page->title = $request->input ('title');
        $page->subtitle = $request->input ('subtitle');
        $page->content = $request->input ('content');
        $page->category_id = $request->input('category_id');
        $page ->save();
        return redirect('/comments');

    }

    /**
     * Remove the specified resource from storage. usuwnie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Comments::find($id);
        $page ->delete();

        return redirect('/comments');
    }
}
