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


Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function () {

    Route::get('', ['as' => 'page', 'uses' => 'AdminController@index' ]);

    Route::group(['prefix' => 'categories'], function () {

        Route::get('', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::post('update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

    });

    Route::group(['prefix' => 'clients'], function () {

        Route::get('', ['as' => 'clients', 'uses' => 'ClientsController@index']);
        Route::get('create', ['as' => 'clients.create', 'uses' => 'ClientsController@create']);
        Route::post('store', ['as' => 'clients.store', 'uses' => 'ClientsController@store']);
        Route::get('edit/{id}', ['as' => 'clients.edit', 'uses' => 'ClientsController@edit']);
        Route::post('update/{id}', ['as' => 'clients.update', 'uses' => 'ClientsController@update']);
        Route::get('destroy/{id}', ['as' => 'clients.destroy', 'uses' => 'ClientsController@destroy']);

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::post('store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::post('update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);

    });
    Route::group(['prefix' => 'orders'], function () {

        Route::get('', ['as' => 'orders', 'uses' => 'OrdersController@index']);
        Route::get('{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
        Route::post('update/{id}', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
    });

    Route::group(['prefix' => 'cupoms'], function () {

        Route::get('', ['as' => 'cupoms', 'uses' => 'CupomController@index']);
        Route::get('create', ['as' => 'cupoms.create', 'uses' => 'CupomController@create']);
        Route::post('store', ['as' => 'cupoms.store', 'uses' => 'CupomController@store']);
    });
});
Route::group(['prefix' => 'costumer', 'as' => 'costumer.'], function(){

    Route::get('order/create', ['as' => 'create', 'uses' => 'CheckoutController@create']);
});

