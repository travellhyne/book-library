<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/api/books', 'BookController@retrieveAll');

Route::post('/api/books', 'BookController@saveBook');

Route::put('/api/books/{id}', 'BookController@updateBook');

Route::get('/api/books/{id}', 'BookController@getBook');

Route::get('/api/search', 'BookController@searchBook');

Route::delete('/api/delete/{id}', 'BookController@deleteBook');
