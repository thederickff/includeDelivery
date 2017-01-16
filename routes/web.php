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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole'], function () {

    Route::get('', ['as' => 'admin.page', 'uses' => 'AdminController@index' ]);

    Route::group(['prefix' => 'categories'], function () {

        Route::get('', ['as' => 'admin.categories', 'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'admin.categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('store', ['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::post('update/{id}', ['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'CategoriesController@destroy']);

    });

    Route::group(['prefix' => 'clients'], function () {

        Route::get('', ['as' => 'admin.clients', 'uses' => 'ClientsController@index']);
        Route::get('create', ['as' => 'admin.clients.create', 'uses' => 'ClientsController@create']);
        Route::post('store', ['as' => 'admin.clients.store', 'uses' => 'ClientsController@store']);
        Route::get('edit/{id}', ['as' => 'admin.clients.edit', 'uses' => 'ClientsController@edit']);
        Route::post('update/{id}', ['as' => 'admin.clients.update', 'uses' => 'ClientsController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.clients.destroy', 'uses' => 'ClientsController@destroy']);

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('', ['as' => 'admin.products', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'ProductsController@create']);
        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit']);
        Route::post('update/{id}', ['as' => 'admin.products.update', 'uses' => 'ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'ProductsController@destroy']);

    });

});


