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

Route::group([
	//'name' => 'backend.',
	'middleware' => 'role:admin',
	'prefix' => 'backend'
	//'namespace' => 'Backend'

], function() {

	Route::get('/','BackendController@dashboard')->name('dashboard');

	Route::resource('category','CategoryController');

	Route::resource('subcategory','SubcategoryController');

	Route::resource('brand','BrandController');

	Route::resource('item','ItemController');

	Route::resource('order','OrderController');

	Route::resource('orderdetail','OrderdetailController');

});

Route::get('/', 'FrontendController@index');

Route::get('/categories', 'FrontendController@categories');

Route::get('/categories/detail/{id}', 'FrontendController@detail');

Route::get('/getitem/{subcategoryid}', 'FrontendController@getitem');

Route::get('/items','FrontendController@items');

Route::get('/items/detail/{id}','FrontendController@itemdetail');

Route::get('/getlogin','FrontendController@getlogin');

Route::get('/cart','FrontendController@cart');

Route::get('/orders','FrontendController@orders');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
