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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 
	'middleware' => ['auth', 'admin']], function(){
	Route::resource('type_products', 'ProductTypesController', ['except' => 'show']);
	// type_product
	// Route::group(['prefix' => 'type_product'], function(){
	// 	Route::get('list','ProductTypeController@getList');

	// 	Route::get('add','ProductTypeController@getAdd');
	// 	// Ham nhan du lieu ve va luu vao CSDL
	// 	Route::post('add','ProductTypeController@postAdd');

	// 	Route::get('edit/{id}','ProductTypeController@getEdit');
	// 	Route::post('edit/{id}','ProductTypeController@postEdit');

	// 	Route::get('delete/{id}','ProductTypeController@getDelete');
	// });
	Route::resource('news', 'NewsController');

	Route::resource('users', 'UsersController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
