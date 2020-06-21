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
Route::group(['middleware'=>'auth'], function () {
    Route::group(['prefix'=>'estoques', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('',             ['as'=>'estoques',         'uses'=>'EstoquesController@index'  ]);
        Route::get('create',       ['as'=>'estoques.create',  'uses'=>'EstoquesController@create' ]);
        Route::get('{id}/destroy', ['as'=>'estoques.destroy', 'uses'=>'EstoquesController@destroy']);
        Route::get('{id}/edit',    ['as'=>'estoques.edit',    'uses'=>'EstoquesController@edit'   ]);
        Route::post('store',       ['as'=>'estoques.store',   'uses'=>'EstoquesController@store'  ]);
        Route::put('{id}/update',  ['as'=>'estoques.update',  'uses'=>'EstoquesController@update' ]);
    });

    Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',             ['as'=>'produtos',         'uses'=>'ProdutosController@index'  ]);
        Route::get('create',       ['as'=>'produtos.create',  'uses'=>'ProdutosController@create' ]);
        Route::get('{id}/destroy', ['as'=>'produtos.destroy', 'uses'=>'ProdutosController@destroy']);
        Route::get('{id}/edit',    ['as'=>'produtos.edit',    'uses'=>'ProdutosController@edit'   ]);
        Route::post('store',       ['as'=>'produtos.store',   'uses'=>'ProdutosController@store'  ]);
        Route::put('{id}/update',  ['as'=>'produtos.update',  'uses'=>'ProdutosController@update' ]);
    });

    Route::group(['prefix'=>'produtoestoques', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('',             ['as'=>'produtoestoques',         'uses'=>'ProdutoEstoquesController@index'  ]);
        Route::get('create',       ['as'=>'produtoestoques.create',  'uses'=>'ProdutoEstoquesController@create' ]);
        Route::get('{id}/destroy', ['as'=>'produtoestoques.destroy', 'uses'=>'ProdutoEstoquesController@destroy']);
        Route::get('{id}/edit',    ['as'=>'produtoestoques.edit',    'uses'=>'ProdutoEstoquesController@edit'   ]);
        Route::post('store',       ['as'=>'produtoestoques.store',   'uses'=>'ProdutoEstoquesController@store'  ]);
        Route::put('{id}/update',  ['as'=>'produtoestoques.update',  'uses'=>'ProdutoEstoquesController@update' ]);
    });

    Route::group(['prefix'=>'movimentos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('',             ['as'=>'movimentos',         'uses'=>'MovimentosController@index'  ]);
        Route::get('create',       ['as'=>'movimentos.create',  'uses'=>'MovimentosController@create' ]);
        Route::post('store',       ['as'=>'movimentos.store',   'uses'=>'MovimentosController@store'  ]);
    });
    Route::group(['prefix'=>'cidades', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('',             ['as'=>'cidades',         'uses'=>'CidadesController@index'  ]);
        Route::any('atualizaCidades',       ['as'=>'cidades.atualizaCidades',   'uses'=>'CidadesController@atualizaCidades'  ]);
        Route::post('store',       ['as'=>'cidades.store',   'uses'=>'CidadesController@store'  ]);
    });

    Route::get('/', function () {
        return view('home');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
