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

Route::get('/', "Main@index")->name('main');

Route::group(['prefix' => 'news'], function ()
{
    Route::get('list', 'NewsController@list')->name('listNews');
    Route::post('create', 'NewsController@create')->name('createNews');
    Route::group(['prefix' => '{id}'], function ()
    {
        Route::get('', 'NewsController@show')->name('showNews');
        Route::get('edit', 'NewsController@edit')->name('editNews');
        Route::get('delete', 'NewsController@delete')->name('deleteNews');
    });
});

Route::get('/list', "ListBooks@index")->name('list');

Route::get('/admin', "AdminController@index")->name('admin');
