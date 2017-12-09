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

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);



Route::group(['prefix' => 'admin'], function(){

	// product
	Route::group(['prefix' => 'product'], function(){
		Route::get('list','ProductController@getList');

		Route::get('add','ProductController@getAdd');
		// Ham nhan du lieu ve va luu vao CSDL
		Route::post('add','ProductController@postAdd');

		Route::get('edit/{id}','ProductController@getEdit');
		Route::post('edit/{id}','ProductController@postEdit');

		Route::get('delete/{id}','ProductController@getDelete');
	});

	// type_product
	Route::group(['prefix' => 'type_product'], function(){
		Route::get('list','ProductTypeController@getList');

		Route::get('add','ProductTypeController@getAdd');
		// Ham nhan du lieu ve va luu vao CSDL
		Route::post('add','ProductTypeController@postAdd');

		Route::get('edit/{id}','ProductTypeController@getEdit');
		Route::post('edit/{id}','ProductTypeController@postEdit');

		Route::get('delete/{id}','ProductTypeController@getDelete');
	});
});

Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){
	Route::resource('news', 'NewsController');

	Route::resource('users', 'UsersController');
});
