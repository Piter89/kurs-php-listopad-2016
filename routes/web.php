<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', 'ProductsController');
Route::resource('articles', 'ArticlesController');
Route::resource('pages', 'PagesController');
Route::resource('comments', 'CommentsController');
Route::resource('categories', 'CategoriesController');
Route::resource('categories_sites', 'CategoriesSitesController');
Auth::routes();

Route::get('/home', 'HomeController@index');
