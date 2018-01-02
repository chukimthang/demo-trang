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

Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'CartController@index']);

   	Route::post('addItem', [
        'as' => 'addItem',
        'uses' => 'CartController@postAddItem'
    ]);

    Route::get('upQuantity', [
        'as' => 'upQuantity', 
        'uses' => 'CartController@getUpQuantity'
    ]);

    Route::get('downQuantity', [
        'as' => 'downQuantity',
        'uses' => 'CartController@getDownQuantity'
    ]);

    Route::post('deleteItem', [
        'as' => 'deleteItem', 
        'uses' => 'CartController@postDeleteItem'
    ]);
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function(){
    Route::group(['prefix' => 'bills', 'as' => 'bills.'], function() {
        Route::post('addAjax', [
            'as' => 'addAjax',
            'uses' => 'BillsController@postAddAjax'
        ]);
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 
    'middleware' => ['auth', 'admin']], function(){
    Route::resource('type_products', 'ProductTypesController', ['except' => 'show', 'destroy']);

    Route::get('type_products/{id}', [
        'as' => 'type_products.destroy',
        'uses' => 'ProductTypesController@destroy'
    ]);
	
    Route::resource('products', 'ProductsController');

    Route::resource('news', 'NewsController');

    Route::resource('users', 'UsersController', ['only' => ['index', 'destroy']]);

    Route::resource('bills', 'BillsController', ['only' => ['index', 'show', 'destroy']]);

    Route::group(['prefix' => 'bills', 'as' => 'bills.'], function() {
        Route::post('edit', [
            'as' => 'edit',
            'uses' => 'BillsController@edit'
        ]);

        Route::post('update', [
            'as' => 'update',
            'uses' => 'BillsController@update'
        ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
