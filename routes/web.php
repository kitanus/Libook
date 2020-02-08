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

Route::get('/', "MainController@index")->name('main');

Route::group(['prefix' => 'news'], function ()
{
    Route::get('list', 'NewsController@list')->name('listNews');
    Route::post('create', 'NewsController@create')->name('createNews');
    Route::group(['prefix' => '{id}'], function ()
    {
        Route::get('', 'NewsController@show')->name('showNews');
        Route::get('edit', 'NewsController@showEdit')->name('showEditNews');
        Route::post('edit', 'NewsController@edit')->name('editNews');
        Route::get('delete', 'NewsController@delete')->name('deleteNews');
    });
});

Route::group(['prefix' => 'list'], function ()
{
    Route::get('{page}', "ListBooksController@index")->name('pageList');
    Route::get('{word}', "ListBooksController@filterWord")->name('filterWord');
});

Route::get('admin', "AdminController@index")->name('admin');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logmin');

