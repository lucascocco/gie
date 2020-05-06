<?php

use Illuminate\Support\Facades\Route;

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

//Route::group(['prefix'=>'usuario', 'where'=>['id'=>'[0-9]+']], function() {
//    Route::get('',             ['as'=>'usuario',         'uses'=>'AtoresController@index'  ]);
//    Route::get('create',       ['as'=>'usuario.create',  'usexs'=>'AtoresController@create' ]);
//    Route::get('{id}/destroy', ['as'=>'usuario.destroy', 'uses'=>'AtoresController@destroy']);
//    Route::get('{id}/edit',    ['as'=>'usuario.edit',    'uses'=>'AtoresController@edit'   ]);
//    Route::post('store',       ['as'=>'usuario.store',   'uses'=>'AtoresController@store'  ]);
//    Route::put('{id}/update',  ['as'=>'usuario.update',  'uses'=>'AtoresController@update' ]);
//});

Route::group(['prefix'=>'estoques', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',             ['as'=>'estoques',         'uses'=>'EstoquesController@index'  ]);
    Route::get('create',       ['as'=>'estoques.create',  'uses'=>'EstoquesController@create' ]);
    Route::get('{id}/destroy', ['as'=>'estoques.destroy', 'uses'=>'EstoquesController@destroy']);
    Route::get('{id}/edit',    ['as'=>'estoques.edit',    'uses'=>'EstoquesController@edit'   ]);
    Route::post('store',       ['as'=>'estoques.store',   'uses'=>'EstoquesController@store'  ]);
    Route::put('{id}/update',  ['as'=>'estoques.update',  'uses'=>'EstoquesController@update' ]);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
